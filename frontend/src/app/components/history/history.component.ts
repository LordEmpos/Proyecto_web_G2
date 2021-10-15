import { Component, OnInit } from '@angular/core';
import { DataService } from 'src/app/services/data.service';

@Component({
  selector: 'app-history',
  templateUrl: './history.component.html',
  styleUrls: ['./history.component.css']
})
export class HistoryComponent implements OnInit {

  reservations: any[] = [];

  constructor(private data:DataService) { }

  ngOnInit(): void {
    this.getReservations();
  }
  
  getReservations(){
    let ctx = this;
    this.data.getReservations().subscribe(function(res){
      ctx.reservations = res as Array<any>;
    });
  }
}
