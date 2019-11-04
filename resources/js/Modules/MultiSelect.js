import './MultiSelect.css'
class MultiSelect extends React.Component{

        constructor(props){
            super(props);
            this.state={
                airports:[],
                searchTerm :'',
                iataCode:'ika',
                airportName:''
            }
        }
        
        render(){
            return(
                <React.Fragment>
                     <input type="text" id={this.props.name +'_myInput'} onChange={(e)=>this.search(e)} onClick={(e)=>this.setState({airportName:'',airports:[]})} className={this.props.className} placeholder={this.props.Placeholder} autocomplete="off" value={this.state.airportName} required/>
     
                     <input type="hidden"  name={this.props.name} id={this.props.prefix +'_'+this.props.name} value={this.state.iataCode} />
     
                     <ul id="myUL"  style={{display: (this.state.searchTerm.length>2 ? 'block' :'none')}} className="myUL ui-menu ui-widget ui-widget-content ui-autocomplete ui-front">
                         {this.props.children}
                         
                         {this.state.airports.map((airport)=>{
                             return (<li className="ui-menu-item" onClick={()=>this.setState({iataCode:airport.iata,searchTerm:'',airportName:airport.name})}>
                                        <a class="airports ui-menu-item-wrapper">
                                             <span>{airport.iata}</span>-{airport.name} - {airport.farsi} - {airport.city}
                                        </a>
                                    </li>)
                         })}   
                     </ul>
                </React.Fragment> 
             ); 
        }


        search=(e)=>{
            this.setState({searchTerm : e.target.value,airportName:this.state.airports + e.target.value},()=>{
                if(this.state.searchTerm.length >=3){
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
                }
            });
        }
       
}//component function 

    
export default MultiSelect;