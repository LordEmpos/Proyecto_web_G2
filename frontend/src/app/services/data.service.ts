import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class DataService {

  private API = 'http://127.0.0.1:8000/api';

  constructor(
    private http:HttpClient
    ) {}

  signup(data:Object):Observable<any>{
        return this.http.post(this.API+'/Cliente/signup', data);
  }

  login(data:Object):Observable<any>{
    return this.http.post(this.API+'/Cliente/login', data);
  }

  updateClient(data:Object):Observable<any>{
    return this.http.post(this.API+'/Cliente/update', data, { headers: this.getTokenHeader() });
  }
  
  getReservations():Observable<any>{
    return this.http.get(this.API+'/reservacion/history', { headers: this.getTokenHeader() });
  }

  getTokenHeader(){
    let token = localStorage.getItem('token');
  return new HttpHeaders({
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${token}`
    });
  }



}