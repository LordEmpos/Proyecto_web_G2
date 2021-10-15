import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { SignupComponent } from './components/signup/signup.component';
import { SignupjComponent } from './components/signupj/signupj.component';
import { LoginComponent } from './components/login/login.component';
import { ProfileComponent } from './components/profile/profile.component';
import { HomeComponent } from './components/home/home.component';
import { ReservationComponent } from './components/reservation/reservation.component';
import { HistoryComponent } from './components/history/history.component';
import { ReservationokComponent } from './components/reservationok/reservationok.component';

const routes: Routes = [
  { path:'signup', component:SignupComponent },
  { path:'signupj', component:SignupjComponent },
  { path:'login', component:LoginComponent },
  { path:'profile', component:ProfileComponent },
  { path:'', component:HomeComponent },
  { path:'reservation/:habitacion_id', component:ReservationComponent },
  { path:'reservation/response/ok', component:ReservationokComponent},
  { path:'history', component:HistoryComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
