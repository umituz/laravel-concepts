import {Injectable} from '@angular/core';
import {HttpClient} from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})

export class ClientService {

  private baseUrl = 'http://localhost:8000/api';

  constructor(private http: HttpClient) {}

  /**
   * Login method  for authentication
   *
   * @param data
   */
  login(data) {
    return this.http.post(`${this.baseUrl}/login`, data);
  }

  /**
   * Signup method for authentication
   *
   * @param data
   */
  signup(data) {
    return this.http.post(`${this.baseUrl}/signup`, data);
  }

  /**
   * Send password reset link
   *
   * @param data
   */
  sendPasswordResetLink(data){
    return this.http.post(`${this.baseUrl}/sendPasswordResetLink`, data);
  }

  /**
   * Changes password
   *
   * @param data
   */
  changePassword(data) {
    return this.http.post(`${this.baseUrl}/resetPassword`, data)
  }

}
