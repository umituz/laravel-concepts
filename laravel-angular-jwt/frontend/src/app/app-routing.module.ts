import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';
import {LoginComponent} from "./components/login/login.component";
import {SignupComponent} from "./components/signup/signup.component";
import {ProfileComponent} from "./components/profile/profile.component";
import {RequestResetComponent} from "./components/password/request-reset/request-reset.component";
import {ResponseResetComponent} from "./components/password/response-reset/response-reset.component";
import {BeforeLoginService} from "./services/before-login.service";
import {AfterLoginService} from "./services/after-login.service";


const routes: Routes = [
  // @ts-ignore
  {path: 'login', component: LoginComponent, canActivate: [BeforeLoginService]},
  // @ts-ignore
  {path: 'signup', component: SignupComponent, canActivate: [BeforeLoginService]},
  // @ts-ignore
  {path: 'profile', component: ProfileComponent, canActivate: [AfterLoginService]},
  // @ts-ignore
  {path: 'request-password-reset', component: RequestResetComponent, canActivate: [BeforeLoginService]},
  // @ts-ignore
  {path: 'response-password-reset', component: ResponseResetComponent, canActivate: [BeforeLoginService]}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {
}
