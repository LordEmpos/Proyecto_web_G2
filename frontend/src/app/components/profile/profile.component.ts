import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';
import { DataService } from 'src/app/services/data.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.css']
})
export class ProfileComponent implements OnInit {

  form = new FormGroup({
    nombre: new FormControl(''),
    apellidos: new FormControl(''),
    correo: new FormControl(''),
    clave: new FormControl('')
  });
  
  reservations: any[] = [];
  datoscliente: any[] = [];

  constructor(
    private data:DataService,
    private router:Router
    ) { }

  ngOnInit(): void {
    this.getReservations();
    this.getDatosCliente();
  }

  refrescarPagina() {
    const currentUrl = this.router.url;
    this.router.navigateByUrl('/', {skipLocationChange: true}).then(() => {
        this.router.navigate([currentUrl]);
    });
  }

  update(){
    this.data.updateClient(this.form.value).subscribe(function(res){
      console.log(res);
    });
    this.refrescarPagina();
  }

  deleteClient(){
    this.data.deleteClient(this.form.value).subscribe(function(res){
      console.log(res);
    });
  }

  getDatosCliente(){
    let ctx = this;
    this.data.getDatosCliente().subscribe(function(res){
      ctx.datoscliente = res as Array<any>;
    });
  }

  getReservations(){
    let ctx = this;
    this.data.getReservations().subscribe(function(res){
      ctx.reservations = res as Array<any>;
    });
  }

}
