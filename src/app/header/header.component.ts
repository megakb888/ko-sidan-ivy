import { Component, OnInit, HostListener, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  navbarOpen = false;

  @HostListener('window:scroll', ['$event'])

  onWindowScroll(e) {
    let element = document.querySelector('.navbar');
    if (window.pageYOffset > element.clientHeight) {
      element.classList.add('navbar-inverse');
    } else {
      element.classList.remove('navbar-inverse');
    }
  }

  toggleNavbar() {
    this.navbarOpen = !this.navbarOpen;
  }
  constructor() { }
  @Output() Navigate = new EventEmitter();
  navigate(element: string) {
    this.Navigate.emit(element)
  }
  ngOnInit() {
  }
}