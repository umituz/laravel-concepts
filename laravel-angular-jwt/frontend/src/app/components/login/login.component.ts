import {Component, OnInit} from '@angular/core';
import {ClientService} from "../../services/client.service";
import {TokenService} from "../../services/token.service";
import {Router} from "@angular/router";
import {AuthService} from "../../services/auth.service";

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  constructor(
    private Client: ClientService,
    private Token: TokenService,
    private router: Router,
    private Auth: AuthService) {
  }

  public error = null;

  public form = {
    email: null,
    password: null
  };

  onSubmit() {
    this.Client.login(this.form).subscribe(
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
    this.Auth.changeAuthStatus(true);
    this.router.navigateByUrl('/profile');
  }

  /**
   * Handle error
   *
   * @param error
   */
  handleError(error) {
    this.error = error.error.error;
  }

  ngOnInit(): void {
  }

}
