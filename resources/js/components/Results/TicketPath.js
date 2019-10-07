import React from 'react';

function TicketPath({segment,index}){
    return (
        <span key={index}>
                        <div className="detail-card">
                          <div className="row">
                            <strong>{this.FormatMiladiDateHour(segment.DepartureDateTime)}</strong>
                            <strong>{segment.DepartureAirportLocationCode}
                              <small>(Imam Khomeini Intl)</small>
                            </strong>
                          </div>
                          <div className="row">
                            <img
                              src={`img/airlines-logo/${segment.MarketingAirlineCode}.png`}
                              alt={`${segment.MarketingAirlineCode} Airline`}/>
                            <div className="description">
                              <small>شماره پرواز:{segment.FlightNumber}
                                / ظرفیت: {segment.SeatsRemaining}
                                نفر</small>
                              <small>کلاس:{this.checkCabinType(segment.CabinClassCode)}</small>
                              <small>طول پرواز:{segment.JourneyDuration}</small>
                              <small>هواپیما: Airbus Industrie A321</small>
                            </div>
                          </div>
                          <div className="row">
                            <strong>{this.FormatMiladiDateHour(segment.ArrivalDateTime)}</strong>
                            <strong>{segment.ArrivalAirportLocationCode}
                              <small>(Istanbul Airport)</small>
                            </strong>
                          </div>
                        </div>
                        <div className="stop-detail">
                          <small>جابجایی در Istanbul / طول توقف: 2H 15m</small>
                        </div>
                      </span>
    );
}

export default TicketPath;