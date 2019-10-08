import React from 'react' 
import {
    airportName,
    checkCabinType,
    formatCurrency,
    calcaulateTravelTime,
    shamsiDate,
    FormatMiladiDate,
    FormatMiladiDateHour,
    ShowDay
  } from './Functions';

function LegDetail({OriginDestinationOptions,index}){
    return (
        <div className="legs-detail flex">
        {OriginDestinationOptions.map((origin,index)=>{
            return <div className="leg-detail"  key={index}>
                <h3>پرواز {index%2==0 ? 'رفت' : 'برگشت'}</h3>
                <p>طول سفر:<span>21h 55m</span></p>
                <p className="green went-time"><i className="fas fa-calendar-day"></i> تاریخ حرکت:
                    <small>{ShowDay(origin.FlightSegments[0].DepartureDateTime)} ({FormatMiladiDate(origin.FlightSegments[0].DepartureDateTime)})</small></p>

                {/*
                <!-- جزییات هر مسیر --> */}

              {origin.FlightSegments.map((segment,index)=>{
                  // console.log(this.props.OriginDestinationOptions);
                  return <span key={index}>
                  <div className="detail-card">
                  <div className="row">
                      <strong>{FormatMiladiDateHour(segment.DepartureDateTime)}</strong>
                      <strong>{segment.DepartureAirportLocationCode} <small>({airportName(segment.DepartureAirportLocationCode)})</small></strong>
                  </div>
                  <div className="row">
                      <img src={`img/airlines-logo/${segment.MarketingAirlineCode}.png`} alt={`${segment.MarketingAirlineCode} Airline`} />
                      <div className="description">
                          <small>شماره پرواز:{segment.FlightNumber} / ظرفیت: {segment.SeatsRemaining} نفر</small>
                          <small>کلاس:{checkCabinType(segment.CabinClassCode)}</small>
                          <small>طول پرواز:{segment.JourneyDuration}</small>
                          <small>هواپیما: Airbus Industrie A321</small>
                      </div>
                  </div>
                  <div className="row">
                      <strong>{FormatMiladiDateHour(segment.ArrivalDateTime)}</strong>
                      <strong>{segment.ArrivalAirportLocationCode} <small>({airportName(segment.ArrivalAirportLocationCode)})</small></strong>
                  </div>
              </div>
              <div className="stop-detail">
                  <small>جابجایی در {airportName(segment.ArrivalAirportLocationCode)} / طول توقف: 2H 15m</small>
              </div>
              </span>
                      
              })}   
            </div>  
        })}
        </div>

    )
}

export default LegDetail;