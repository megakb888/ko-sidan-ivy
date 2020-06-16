import { Component, ViewChild } from "@angular/core";

@Component({
  selector: "my-app",
  templateUrl: "./app.component.html",
  styleUrls: ["./app.component.css"]
})
export class AppComponent {
  name = "Angular";

  @ViewChild("henrik", { static: false }) henrik;
  @ViewChild("vision", { static: false }) vision;
  @ViewChild("process", { static: false }) process;
  @ViewChild("info", { static: false }) info;
  @ViewChild("levererar", { static: false }) levererar;
  @ViewChild("team", { static: false }) team;
  @ViewChild("kontakt", { static: false }) kontakt;

  navigate(element: string) {
    this[element].nativeElement.scrollIntoView({ behavior: "smooth" });
  }
}
