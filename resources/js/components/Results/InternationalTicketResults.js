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
            airlines:[],
            tempTickets:[]
        };
    }

    //###################################### بدست آوردن لیست ایرلاین ها برای بخش فیلتر #################
    getAirlines = ()=>{
        //لیست ایرلاینها رو هم جدا میکنیم
        this.setState({airlines:this.state.tickets.map((airline)=>{
            return airline.OriginDestinationOptions[0].FlightSegments[0].MarketingAirlineCode
        }).filter(onlyUnique)});
        // لیست بلیط ها رو برای فیلتر کردن تو یک متغییر دیگه نگه میدارم
        this.setState({tempTickets:[...this.state.tickets]});
    }

    //####################### دریافت بلیط از سرور ######################################################
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
    //######################## Component Did Mount ######################################################
    componentDidMount(){
       this.getTickets();
    }

    //###################### فیلتر بر پایه چارتر بودن یا نبودن پرواز ##################################
    checkCharter=(charter)=>{
            this.setState({tickets : this.state.tempTickets.filter(ticket => ticket.OriginDestinationOptions[0].FlightSegments[0].IsCharter ==charter ? ticket : null)})  
    }
    //###################### فیلتر کردن بر اساس تعداد توقف های موجود ##################################
    StopCount=(count)=>{
            this.setState({tickets : this.state.tempTickets.filter(ticket => ticket.OriginDestinationOptions[0].FlightSegments[0].StopQuantity == count ? ticket : null)})  
    }

    //#################### انتخاب ایرلاین بر اساس فیلتر ها #############################################
    chooseAirline=(airlines)=>{
            if(airlines.length==0){
                this.setState({tickets: this.state.tempTickets})
            }else{
                this.setState({tickets : this.state.tempTickets.filter(
                    function(ticket){
                        return airlines.includes(ticket.OriginDestinationOptions[0].FlightSegments[0].MarketingAirlineCode)
                    }
                )}) 
            }
             
    }

    //#################### انتخاب کلاس پروازی بر اساس فیلتر ها #############################################
    chooseCabinType=(cabinCodes)=>{
        if(cabinCodes.length==0){
            this.setState({tickets:this.state.tempTickets})
        }else{
            this.setState({tickets : this.state.tempTickets.filter(
                function(ticket){
                    return cabinCodes.includes(String(ticket.OriginDestinationOptions[0].FlightSegments[0].CabinClassCode))
                }
            )}) 
        }
        
    }

    //################################# RENDER FUNCTION ##################################################
    render=()=>{
            let msg= (
                <LoadingModal />
            );

            let error = `جستجوی شما نتیجه ای در بر نداشت.`
            
            if(this.state.tickets.length==0){
                return(
                    <section className="result-panel container">
                         <Filters checkCharter={this.checkCharter} airlines={this.state.airlines} StopCount = {this.StopCount} chooseAirline = {this.chooseAirline} chooseCabinType= {this.chooseCabinType}/> 
                        
                        {(this.state.isLoading) ? msg :error}
                    </section>
                
                    );
            }else{

            
            return (  
                <section className="result-panel container">
                    {(this.state.airlines.length > 0) ? 
                    <Filters checkCharter={this.checkCharter} airlines={this.state.airlines} StopCount = {this.StopCount} chooseAirline = {this.chooseAirline}  chooseCabinType= {this.chooseCabinType}/> :null}                    
                    <Results tickets={this.state.tickets}/>
            </section>     
            );

        }//else
    }

}//end of class

if(document.querySelector('#InternationalTicketResults')){

    ReactDOM.render(<InternationalTicketResults/> , document.querySelector('#InternationalTicketResults'));
}

// export default InternationalTicketResults;