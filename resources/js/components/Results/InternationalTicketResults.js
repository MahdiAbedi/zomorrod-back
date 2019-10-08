import React from 'react';
import ReactDOM from 'react-dom';
import myTickets from './RoundTripTicket.json';
import Filters from './Filters';
import Results from './Results';
import myTickets2 from './TicketResults.json';
import axios from 'axios';
import LoadingModal from './LoadingModal';
import {onlyUnique} from './Functions'

class InternationalTicketResults extends React.Component{

    constructor(props){
        super(props);
        this.state = {
            tickets:[],
            isLoading:true,
            airlines:[]
        };
    }


    getAirlines = ()=>{
        //لیست ایرلاینها رو هم جدا میکنیم
        this.setState({airlines:this.state.tickets.map((airline)=>{
            return airline.OriginDestinationOptions[0].FlightSegments[0].MarketingAirlineCode
        }).filter(onlyUnique)});
    }

    //دریافت بلیط از سرور
    getTickets=()=>{
        axios.post('/checkTicket1',{
            // PricingSourceType    :localStorage.getItem(''),
            // RequestOption        :localStorage.getItem(''),

            AdultCount              :localStorage.getItem('international_adult'),
            ChildCount              :localStorage.getItem('international_child'),
            InfantCount             :localStorage.getItem('international_infant'),

            // CabinType            :localStorage.getItem(''),
            // MaxStopsQuantity     :localStorage.getItem(''),
            // AirTripType          :localStorage.getItem(''),

            DepartureDateTime       :localStorage.getItem('international_departureTime'),
            DestinationLocationCode :localStorage.getItem('international_destination'),
            // DestinationType      :localStorage.getItem(''),
            OriginLocationCode      :localStorage.getItem('international_origin'),
            // OriginType           :localStorage.getItem(''),
            IsRoundTrip             :localStorage.getItem('international_IsRoundTrip'),
            ReturnTime              :localStorage.getItem('international_returnTime'),
        })
        .then(response => {
            // let myTickets=response.data;
            // this.setState({tickets:myTickets.PricedItineraries})
             this.setState({
                tickets:myTickets.PricedItineraries,
                isLoading:false,
            })

            this.getAirlines()

        })
       .catch((error)=>{
          console.log(error);
       });
    }
    componentDidMount(){
       this.getTickets();
    }

    checkCharter=(charter)=>{
        this.state.tickets.filter((ticket)=>{
                return ticket.OriginDestinationOptions[0].FlightSegments[0].IsCharter ==charter ? ticket : null;
            })
        
    }

    render=()=>{
            let msg= (
                <LoadingModal />
            );

            let error = `جستجوی شما نتیجه ای در بر نداشت.`
            
            if(this.state.tickets.length==0){
                return(
                    <section className="result-panel container">
                         {/* <Filters  mahdi={this.airlines} /> */}
                        
                        {(this.state.isLoading) ? msg :error}
                    </section>
                
                    );
            }else{

            
            return (  
                <section className="result-panel container">
                    {(this.state.airlines.length > 0) ? <Filters checkCharter={this.checkCharter} airlines={this.state.airlines} /> :null}                    
                    <Results tickets={this.state.tickets}/>
            </section>     
            );

        }//else
    }

}

if(document.querySelector('#InternationalTicketResults')){

    ReactDOM.render(<InternationalTicketResults/> , document.querySelector('#InternationalTicketResults'));
}

// export default InternationalTicketResults;