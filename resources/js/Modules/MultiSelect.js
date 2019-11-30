import './MultiSelect.css'
class MultiSelect extends React.Component{

        constructor(props){
            super(props);
            // this.destination = this.props.prefix +'_'+this.props.name;

            this.state={
                airports:[
                {
                    iata:'IKA',
                    name:'IMAM KHOMEINI AIRPORT',
                    farsi:'فرودگاه امام خمینی',
                    city:'تهران',
                    country:'IRAN'
                },
                {
                    iata:'DXB',
                    name:'Dubai Intl',
                    farsi:'فرودگاه بین المللی دبی',
                    city:'دبی',
                    country:'UNITED ARAB EMIRATES'
                },
                {
                    iata:'XNB',
                    name:'Travel Mall Ey Bus Stn',
                    farsi:'فرودگاه دبی',
                    city:'دبی',
                    country:'UNITED ARAB EMIRATES'
                },
                {
                    iata:'DWC',
                    name:'Al Maktoum Intl',
                    farsi:'آل مکتوم',
                    city:'دبی',
                    country:'UNITED ARAB EMIRATES'

                },
                {
                    iata:'DWC',
                    name:'Free Zone',
                    farsi:'دوحه',
                    city:'دوحه',
                    country:'QATAR'

                },
                {
                    iata:'XOZ',
                    name:'Al Maktoum Intl',
                    farsi:'آل مکتوم',
                    city:'دبی',
                    country:'UNITED ARAB EMIRATES'

                },
                {
                    iata:'DOH',
                    name:'Hamad International',
                    farsi:'دوحه',
                    city:'حمد',
                    country:'QATAR'

                },
                {
                    iata:'FRA',
                    name:'Frankfurt Intl',
                    farsi:'فرانکفورت',
                    city:'فرانکفورت',
                    country:'GERMANY'

                },
                {
                    iata:'HHN',
                    name:'Hahn Airport',
                    farsi:'فرانکفورت',
                    city:'هان',
                    country:'GERMANY'

                },
                {
                    iata:'IST',
                    name:'Istanbul New AirPort',
                    farsi:'فرودگاه جدید',
                    city:'استانبول',
                    country:'TURKEY'

                },
                {
                    iata:'SAW',
                    name:'Sabiha Gokcen',
                    farsi:'سابیها استانبول',
                    city:'استانبول',
                    country:'TURKEY'

                },
                {
                    iata:'GYD',
                    name:'Heydar Aliyev Intl',
                    farsi:'حیدر علی اف',
                    city:'باکو',
                    country:'AZERBAIJAN'

                },
                {
                    iata:'AMS',
                    name:'Schiphol Airport',
                    farsi:'امستردام',
                    city:'امستردام',
                    country:'NETHERLANDS'

                },
                {
                    iata:'FCO',
                    name:'Fiumicino',
                    farsi:'فیومیچینو',
                    city:'رم',
                    country:'ITALY'

                },
                {
                    iata:'XRK',
                    name:'Paveletsky Rail Stn',
                    farsi:'مسکو',
                    city:'مسکو',
                    country:'RUSSIAN FEDERATION'

                },
                {
                    iata:'DME',
                    name:'Domodedovo',
                    farsi:'دوموده دوو-مسکو ',
                    city:'مسکو',
                    country:'RUSSIAN FEDERATION'

                },
                {
                    iata:'SVO',
                    name:'Sheremetyevo',
                    farsi:'شرمتیوو',
                    city:'مسکو',
                    country:'RUSSIAN FEDERATION'

                },
                {
                    iata:'JQF',
                    name:'Savelovsky Railway St',
                    farsi:'مسکو',
                    city:'مسکو',
                    country:'RUSSIAN FEDERATION'

                },
                {
                    iata:'BKA',
                    name:'Bykovo',
                    farsi:'مسکو',
                    city:'مسکو',
                    country:'RUSSIAN FEDERATION'

                },
                {
                    iata:'JQO',
                    name:'Belorussky Railway St',
                    farsi:'مسکو',
                    city:'مسکو',
                    country:'RUSSIAN FEDERATION'

                },
                {
                    iata:'VKO',
                    name:'Vnukovo Intl',
                    farsi:'مسکو',
                    city:'ونوکووا',
                    country:'RUSSIAN FEDERATION'

                }
               
            ],
                searchTerm :'',
                iataCode:'IKA',
                airportName:'',
                displayList:'none'
            }
        }

        componentDidMount=()=>{
            //اگر قبلا فرودگاه رو انتخاب کرده بود اطلاعاتش از لوکال استورج بیاد
                //ست کردن تنظیمات فرودگاه مبدا
                this.setState({
                    iataCode:localStorage.getItem(this.props.prefix +'_'+this.props.name+'_iataCode'),
                    airportName:localStorage.getItem(this.props.prefix +'_'+this.props.name+'_airportName')
                });
        }
        
        render(){
            return(
                <React.Fragment>
                     <input type="text" id={this.props.name +'_myInput'} onChange={(e)=>this.search(e)} onClick={(e)=>{this.displayList(e);this.setState({displayList:'block'})}} className={this.props.className} placeholder={this.props.Placeholder} autocomplete="off" value={(this.state.airportName) ? this.state.airportName :'' } required/>
     
                     <input type="hidden"  name={this.props.name} id={this.props.prefix +'_'+this.props.name} value={this.state.iataCode} />
     
                     <ul id="myUL"  style={{display: this.state.displayList}} className="myUL ui-menu ui-widget ui-widget-content ui-autocomplete ui-front">
                         {this.props.children}
                         
                        


                         {this.state.airports.map((airport)=>{
                             return (<li className="ui-menu-item" onClick={()=>this.onSelectEvent(airport)}>
                                        <a class="airports ui-menu-item-wrapper">
                                             <span>{airport.iata}</span>-{airport.name} - {airport.farsi} - {airport.city}- {airport.country}
                                        </a>
                                    </li>)
                         })}   
                     </ul>
                </React.Fragment> 
             ); 
        }


        //رویدادی که هنگام انتخاب نام فرودگاه از لیست فرودگاه میفته
        onSelectEvent(airport){
            this.setState({iataCode:airport.iata,searchTerm:'',airportName:airport.name,displayList:'none'});
            //اگر قبلا فرودگاه رو انتخاب کرده بود اطلاعاتش از لوکال استورج بیاد
            //ست کردن تنظیمات فرودگاه مبدا
                
            localStorage.setItem(this.props.prefix +'_'+this.props.name+'_iataCode',airport.iata)
            localStorage.setItem(this.props.prefix +'_'+this.props.name+'_airportName',airport.name)
        }

        displayList(e){
            if(this.state.airportName){

                this.setState({airportName:''})
                // this.setState({airportName:'',airports:[]})
            }else{
                this.setState({displayList:'block'})
            }
        }
        search=(e)=>{
            this.setState({searchTerm : e.target.value,airportName:e.target.value},()=>{
                
                if(this.state.searchTerm.length >=3){
                    this.setState({displayList:'block'})
                    axios.post('/airports', {
                        q:this.state.searchTerm 
                    })
                    .then( (response)=> {
                        this.setState({
                            airports:response.data
                        }); 
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                    //   console.log('hello')
                    //   console.log(this.state.airports)
                }else{
                    this.setState({displayList:'none'})
                }
            });
        }
       
}//component function 

    
export default MultiSelect;