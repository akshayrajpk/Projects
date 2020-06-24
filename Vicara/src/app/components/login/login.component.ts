import { Component, OnInit } from '@angular/core';
import { TodoService } from 'src/app/services/todo.service'


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  credentials = {
    email: '',
    password: ''
  }

  constructor(private todoService: TodoService) { }

  ngOnInit(): void {
  }

  login() {
    //console.log(this.credentials);

    this.todoService.loginValidation(this.credentials);
  }

}
