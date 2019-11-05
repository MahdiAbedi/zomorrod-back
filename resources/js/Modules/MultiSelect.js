import './MultiSelect.css'
class MultiSelect extends React.Component{

        constructor(props){
            super(props);
            this.state={
                airports:[{
                    iata:'IKA',
                    name:'IMAM KHOMEINI AIRPORT',
                    farsi:'فرودگاه امام خمینی',
                    city:'تهران'

                }],
                searchTerm :'',
                iataCode:'IKA',
                airportName:'',
                displayList:'none'
            }
        }
        
        render(){
            return(
                <React.Fragment>
                     <input type="text" id={this.props.name +'_myInput'} onChange={(e)=>this.search(e)} onClick={(e)=>{this.displayList(e);this.setState({displayList:'block'})}} className={this.props.className} placeholder={this.props.Placeholder} autocomplete="off" value={(this.state.airportName) ? this.state.airportName :'' } required/>
     
                     <input type="hidden"  name={this.props.name} id={this.props.prefix +'_'+this.props.name} value={this.state.iataCode} />
     
                     <ul id="myUL"  style={{display: this.state.displayList}} className="myUL ui-menu ui-widget ui-widget-content ui-autocomplete ui-front">
                         {this.props.children}
                         
                        


                         {this.state.airports.map((airport)=>{
                             return (<li className="ui-menu-item" onClick={()=>this.setState({iataCode:airport.iata,searchTerm:'',airportName:airport.name,displayList:'none'})}>
                                        <a class="airports ui-menu-item-wrapper">
                                             <span>{airport.iata}</span>-{airport.name} - {airport.farsi} - {airport.city}
                                        </a>
                                    </li>)
                         })}   
                     </ul>
                </React.Fragment> 
             ); 
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