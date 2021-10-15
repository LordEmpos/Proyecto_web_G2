import { Component, OnDestroy, OnInit } from '@angular/core';
import { ActivatedRoute, Params } from '@angular/router';
import { DataService } from 'src/app/services/data.service';
import { FormControl, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-reservation',
  templateUrl: './reservation.component.html',
  styleUrls: ['./reservation.component.css']
})
export class ReservationComponent implements OnInit {
  
  habitacion_id:number = 0;
  
  form = new FormGroup({
    habitacion_id: new FormControl(this.habitacion_id),
    fecha_inicio: new FormControl(''),
    fecha_fin: new FormControl(''),
    huespedes: new FormControl('')
  });

  results: any[] = [];

  constructor(
    private route: ActivatedRoute,
    private data:DataService,
    private router:Router
  ) {}

  ngOnInit(): void {
    this.getReservaData()
    this.route.params.subscribe((params: Params)=>{
      console.log(params)
      this.habitacion_id = params.habitacion_id
    })
  }

  getHab(){
    this.route.params.subscribe((params: Params)=>{
      console.log(params)
      this.habitacion_id = params.habitacion_id
    })
    return this.habitacion_id
  }
  
  getReservaData(){
    let ctx = this;
    let data = {
      filter: 'id',
      value: this.getHab()
    };
    this.data.getReservaData(data).subscribe((res)=>{
      console.log(res);
      ctx.results = res as Array<any>;
    });
  }

  createReservation(){
    this.data.createReservation(this.form.value).subscribe(function(res){
      console.log(res);
    });
    this.router.navigate(['reservation/response/ok']);
  }

}
