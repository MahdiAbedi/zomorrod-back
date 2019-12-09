// import myTickets from './RoundTripTicket.json';
import Filters from './Filters';
import Results from './Results';
// import myTickets2 from './TicketResults.json';
import LoadingModal from './LoadingModal';

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
        axios.post('/checkTicket',{
            // PricingSourceType    :localStorage.getItem(''),
            // RequestOption        :localStorage.getItem(''),

            AdultCount              :localStorage.getItem('adult'),
            ChildCount              :localStorage.getItem('child'),
            InfantCount             :localStorage.getItem('infant'),

            // CabinType            :localStorage.getItem(''),
            // MaxStopsQuantity     :localStorage.getItem(''),
            // AirTripType          :localStorage.getItem(''),

            DepartureDateTime       :PartoDateFormat(localStorage.getItem('departureTime')),
            DestinationLocationCode :localStorage.getItem('destination'),
            // DestinationType      :localStorage.getItem(''),
            OriginLocationCode      :localStorage.getItem('origin'),
            // OriginType           :localStorage.getItem(''),
            IsRoundTrip             :localStorage.getItem('IsRoundTrip'),
            ReturnTime              :PartoDateFormat(localStorage.getItem('returnTime')),
            MaxStopsQuantity        :0//همه پروازها اعم مستقیم و غیر مستقیم

        })
        .then(response => {
            let myTickets=response.data;
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
        // alert('counting')
            this.setState({tickets : this.state.tempTickets.filter(ticket => ticket.OriginDestinationOptions[0].FlightSegments.length == count+1 ? ticket : null)})  
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

    //#################### فیلتر پروازها بر اساس ساعت پرواز #############################################
    filterByTime=(accending="true")=>{
        if(accending){
            this.setState({tickets : this.state.tempTickets.sort(
                function(a,b){
                    if(a.OriginDestinationOptions[0].FlightSegments[0].DepartureDateTime < b.OriginDestinationOptions[0].FlightSegments[0].DepartureDateTime){
                        return -1;
                    }
                    if(a.OriginDestinationOptions[0].FlightSegments[0].DepartureDateTime > b.OriginDestinationOptions[0].FlightSegments[0].DepartureDateTime){
                        return 1;
                    }
                   
                }
            )}) 
        }else{
            this.setState({tickets : this.state.tempTickets.sort(
                function(a,b){
                    if(a.OriginDestinationOptions[0].FlightSegments[0].DepartureDateTime < b.OriginDestinationOptions[0].FlightSegments[0].DepartureDateTime){
                        return 1;
                    }
                    if(a.OriginDestinationOptions[0].FlightSegments[0].DepartureDateTime > b.OriginDestinationOptions[0].FlightSegments[0].DepartureDateTime){
                        return -1;
                    }
                   
                }
            )}) 
        }
        
    }
    //#################### فیلتر پروازها بر اساس ظرفیت پرواز #############################################
    filterByCapacity=(accending="true")=>{
        if(accending){
            this.setState({tickets : this.state.tempTickets.sort(
                function(a,b){
                    console.log(a.OriginDestinationOptions[0].FlightSegments[0].SeatsRemaining)
                    if(a.OriginDestinationOptions[0].FlightSegments[0].SeatsRemaining < b.OriginDestinationOptions[0].FlightSegments[0].SeatsRemaining){
                        return -1;
                    }
                    if(a.OriginDestinationOptions[0].FlightSegments[0].SeatsRemaining > b.OriginDestinationOptions[0].FlightSegments[0].SeatsRemaining){
                        return 1;
                    }
                   
                }
            )}) 
        }else{
            this.setState({tickets : this.state.tempTickets.sort(
                function(a,b){
                    if(a.OriginDestinationOptions[0].FlightSegments[0].SeatsRemaining < b.OriginDestinationOptions[0].FlightSegments[0].SeatsRemaining){
                        return 1;
                    }
                    if(a.OriginDestinationOptions[0].FlightSegments[0].SeatsRemaining > b.OriginDestinationOptions[0].FlightSegments[0].SeatsRemaining){
                        return -1;
                    }
                   
                }
            )}) 
        }
        
    }
    //#################### فیلتر پروازها بر اساس ظرفیت پرواز #############################################
    filterByPrice=(accending="true")=>{
        if(accending){
            this.setState({tickets : this.state.tempTickets.sort(
                function(a,b){
                    if(a.AirItineraryPricingInfo.ItinTotalFare.TotalFare < b.AirItineraryPricingInfo.ItinTotalFare.TotalFare){
                        return -1;
                    }
                    if(a.AirItineraryPricingInfo.ItinTotalFare.TotalFare > b.AirItineraryPricingInfo.ItinTotalFare.TotalFare){
                        return 1;
                    }
                   
                }
            )}) 
        }else{
            this.setState({tickets : this.state.tempTickets.sort(
                function(a,b){
                    if(a.AirItineraryPricingInfo.ItinTotalFare.TotalFare < b.AirItineraryPricingInfo.ItinTotalFare.TotalFare){
                        return 1;
                    }
                    if(a.AirItineraryPricingInfo.ItinTotalFare.TotalFare > b.AirItineraryPricingInfo.ItinTotalFare.TotalFare){
                        return -1;
                    }
                   
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
                         <Filters checkCharter={this.checkCharter} airlines={this.state.airlines} StopCount = {this.StopCount} chooseAirlzine = {this.chooseAirline} chooseCabinType= {this.chooseCabinType} resultsCount={this.state.tickets.length}/> 
                        
                        {(this.state.isLoading) ? msg :error}
                    </section>
                
                    );
            }else{

            
            return (  
                <section className="result-panel container">
                    {(this.state.airlines.length > 0) ? 
                    <Filters checkCharter={this.checkCharter} airlines={this.state.airlines} StopCount = {this.StopCount} chooseAirline = {this.chooseAirline}  chooseCabinType= {this.chooseCabinType} resultsCount={this.state.tickets.length}/> :null}                    
                    <Results 
                    tickets={this.state.tickets}
                    isInline={false} 
                    filterByTime= {this.filterByTime}
                    filterByPrice= {this.filterByPrice}
                    filterByCapacity= {this.filterByCapacity}/>

            </section>     
            );

        }//else
    }

}//end of class

if(document.querySelector('#InternationalTicketResults')){

    ReactDOM.render(<InternationalTicketResults/> , document.querySelector('#InternationalTicketResults'));
}

// export default InternationalTicketResults;