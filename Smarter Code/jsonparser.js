const fs = require('fs')

var data;
var body;
var headStr = "->";
var depthCount = 1;

fs.readFile('foodyo_output.json', 'utf8', (err, fileContents) => {
    if (err) {
        console.error(err)
        return
    }
    try {
        data = JSON.parse(fileContents)
        body = data.body;
        recParser(body.Recommendations);
    } catch (err) {
        console.error(err)
    }
})

function depthPrinter(depth) {
    var str = "-"
    for (var i = 0; i < depth; i++) {
        str += "-";
    }
    return str;
}

function recParser(arr) {
    for (var i = 0; i < arr.length; i++) {
        console.log("");
        console.log(headStr + arr[i].RestaurantName);
        menuParse(arr[i].menu);
    }
}

function menuParse(menu) {
    if (menu[0].type == "sectionheader") {
        childParse(menu[0].children)
    }

}

function childParse(child) {
    if (child[0].type == "item" && child[0].selected == 1) {
        console.log("-" + headStr + child[0].name);
        subChildParse(child[0].children);
    }
}

function subChildParse(subChild) {
    for (var i = 0; i < subChild.length; i++) {
        if (subChild[i].selected == 1) {
            console.log(depthPrinter(depthCount) + headStr + subChild[i].name);

            if (subChild[i].children.length > 0) {
                depthCount++;
                subChildParse(subChild[i].children);
            }
            else {
                depthCount--;
            }
        }

    }
}