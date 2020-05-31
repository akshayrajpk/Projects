
import os
from flask import Flask, request, render_template, jsonify
from twitter import TwitterClient

app = Flask(__name__)
# Setup the client <query string, retweets_only bool, with_sentiment bool>
api = TwitterClient('@AnoopBenny5')


def strtobool(v):
    return v.lower() in ["yes", "true", "t", "1"]


@app.route('/')
def index():

    return render_template('indexa.html')


@app.route('/tweets')
def tweets():
        retweets_only = request.args.get('retweets_only')
        api.set_retweet_checking(strtobool(retweets_only.lower()))
        with_sentiment = request.args.get('with_sentiment')
        api.set_with_sentiment(strtobool(with_sentiment.lower()))
        query = request.args.get('query')
        api.set_query(query)
        
        
        dt = request.args.get('d')
       # api.set_styr(dt)
        mn = request.args.get('m')
       # api.set_enyr(mn)
        yer = request.args.get('y')
        api.set_yer(dt, mn, yer)
        
        # st = request.args.get('st')
        # set_styr(st)
        # en = request.args.get('en')
        # set_enyr(en)
        

        tweets = api.get_tweets()
        return jsonify({'data': tweets, 'count': len(tweets)})


port = int(os.environ.get('PORT', 5003))
#app.run(host="0.0.0.0", port=port, debug=True)
app.run(host="127.0.0.5", port=port, debug=True)
