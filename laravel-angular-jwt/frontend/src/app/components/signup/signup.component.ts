import {Component, OnInit} from '@angular/core';
import {ClientService} from "../../services/client.service";
import {TokenService} from "../../services/token.service";
import {Router} from "@angular/router";

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {

  public errors = {
    name: null,
    email: null,
    password: null
  };

  public
  form = {
    name: null,
    email: null,
    password: null,
    password_confirmation: null
  };

  constructor(
    private Client: ClientService,
    private Token: TokenService,
    private router: Router
  ) {
  }

  onSubmit() {
    this.Client.signup(this.form).subscribe(
      data => this.handleResponse(data),
      error => this.handleError(error)
    );
  }

  /**
   * Handle response
   *
   * @param data
   */
  handleResponse(data) {
    this.Token.handle(data.access_token);
    this.router.navigateByUrl('/profile');
  }

  handleError(error) {
    this.errors = error.error.errors;
  }

  ngOnInit()
    :
    void {
  }

}
