import {Component, OnInit} from '@angular/core';
import {ClientService} from "../../../services/client.service";
import {SnotifyService} from "ng-snotify";

@Component({
  selector: 'app-request-reset',
  templateUrl: './request-reset.component.html',
  styleUrls: ['./request-reset.component.css']
})
export class RequestResetComponent implements OnInit {

  public form = {
    email: null
  };

  constructor(
    private Client: ClientService,
    private notify: SnotifyService
  ) {
  }

  ngOnInit(): void {
  }

  onSubmit() {
    this.notify.info('Wait...', {timeout: 5000});
    this.Client.sendPasswordResetLink(this.form).subscribe(
      data => this.handleResponse(data),
      error => this.notify.error(error.error.error)
    );
  }

  handleResponse(res) {
    this.notify.success(res.data, {timeout: 0});
    this.form.email = null;
  }
}
