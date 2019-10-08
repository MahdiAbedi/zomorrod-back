import React from 'react';
import moment from 'moment-jalaali';

import {
  airportName,
  checkCabinType,
  formatCurrency,
  calcaulateTravelTime,
  shamsiDate,
  FormatMiladiDate,
  FormatMiladiDateHour
} from './Functions';

function Leg({OrginDestination, index}) {
  // console.log(OrginDestination.FlightSegments)
  return (
    <div className="first-leg leg flex-between" key={index}>
      <div className="logoes ">
        {OrginDestination
          .FlightSegments
          .map((segment, index) => {
            return <img
              src={`img/airlines-logo/${segment.MarketingAirlineCode}.png`}
              key={index}
              alt={`${segment.MarketingAirlineCode} Airline`}/>
          })}
          {/* end of map  */}
      </div>{/* end of logoes  */}
      {/* مبدا */}
      <p className="destination">
        {airportName(localStorage.getItem('international_origin'))}
        {/* زمان حرکت  */}
        <span>{moment(OrginDestination.FlightSegments[0].DepartureDateTime).format('jYYYY/jM/jD HH:mm')}</span>
      </p>
      <div className="path">
        <span>طول سفر:{calcaulateTravelTime(OrginDestination.FlightSegments[0].JourneyDurationPerMinute)}
        </span>
        <ul className="path flex-between">
          <li>
            <i
              className={`${index % 2 != 0
              ? 'circle'
              : 'fa fa-plane rotate-right'} `}></i>
          </li>
          <li>
            <i
              className={`${index % 2 == 0
              ? 'circle'
              : 'fa fa-plane rotate-left'} `}></i>
          </li>
        </ul>
        <span>{OrginDestination.FlightSegments[0].StopQuantity}
          توقف: {OrginDestination.FlightSegments[0].ArrivalAirportLocationCode},{OrginDestination.FlightSegments[0].DepartureAirportLocationCode}
        </span>
      </div>
      <p className="destination">
        {airportName(localStorage.getItem('international_destination'))}
        {/* زمان رسیدن */}
        <span>{moment(OrginDestination.FlightSegments[0].ArrivalDateTime).format('jYYYY/jM/jD HH:mm')}</span>
      </p>
    </div>
  )
}

export default Leg;