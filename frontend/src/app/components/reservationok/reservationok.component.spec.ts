import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ReservationokComponent } from './reservationok.component';

describe('ReservationokComponent', () => {
  let component: ReservationokComponent;
  let fixture: ComponentFixture<ReservationokComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ReservationokComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ReservationokComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
