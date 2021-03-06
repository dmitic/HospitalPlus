import React, { Component } from "react";
import ReactDOM from 'react-dom';
import Temp from "./Temp"
import Datum from "./Date"
import Time from "./Time"

class Prognoza extends Component {
  constructor() {
    super();
    this.state = {
      weather: {
        temperature: "",
        src: ""
      },
      time: {
        date: new Date(),
        hours: new Date().toLocaleTimeString('sr-SR')
      }
    };
    this.fetchData = this.fetchData.bind(this);
    this.otkucaj = this.otkucaj.bind(this);
  }

  fetchData() {
    let weatherUrl = `http://api.openweathermap.org/data/2.5/weather?q=belgrade&units=metric&APPID=9965fd4f859c5527e02040fa9ff6d3de`;

    (async () => {
      let response = await fetch(weatherUrl);
      let data = await response.json();
      this.setState({
        weather: {
          temperature: data.main.temp,
          src: `http://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`
        }
      });
    })();
  }

  componentDidMount() {
    this.fetchData();
    this.timer = setInterval(() => this.otkucaj(), 1000);
  }

  otkucaj() {
    this.setState({
      time: {
        hours: new Date().toLocaleTimeString('sr-SR')
      }
    });
  }

  componentWillUnmount() {
    clearInterval(this.timer);
  }

  render() {
    return (
    
      <div className="col-md-4 text-center">
                <div className="widget rounded">
                    <div className="float-left m-2">
                        <p className="grad">Beograd</p>
                    </div>
                    <Datum datum={this.state.time.date} />
                    <Time vreme={this.state.time.hours}/>
                    
                   <Temp temperatura={Math.round(this.state.weather.temperature)} src={this.state.weather.src} />
                </div>
            </div>
      
    );
  }
}

if (document.getElementById('weather-date-time')) {
  ReactDOM.render(<Prognoza />, document.getElementById('weather-date-time'));
}
