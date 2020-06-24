import { Component, OnInit } from '@angular/core';
import { Todo } from '../../models/Todo'
import { ThrowStmt } from '@angular/compiler';

import { TodoService } from 'src/app/services/todo.service'

@Component({
  selector: 'app-todos',
  templateUrl: './todos.component.html',
  styleUrls: ['./todos.component.css']
})
export class TodosComponent implements OnInit {

  todos: Todo[];

  constructor(private todoService: TodoService) { }

  ngOnInit(): void {
    this.todoService.getTodos().subscribe(todos => {
      this.todos = todos;
    })
  }

  deleteTodo(todo: Todo) {
    console.log(todo);
    console.log("TODOS");
    //Rem frm UI
    this.todos = this.todos.filter(t => t.id != todo.id);
    console.log(this.todos);
    console.log("TODOS");

    //remove frm server
    this.todoService.deleteTodo(todo).subscribe();
  }

  addTodo(todo: Todo) {
    console.log(todo);
    this.todoService.addTodo(todo).subscribe(todo => {
      this.todos.push(todo);
    });
  }
}
