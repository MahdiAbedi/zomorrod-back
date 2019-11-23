import './MultiSelect.css'
class HotelSelector extends React.Component{

        constructor(props){
            super(props);
            this.state={
                hotels:[
                {
                    country:'ترکیه',
                    farsiName:'استانبول',
                    propertyDestinationId:'512',
                    count:325,
                    city:'Istanbul'
                },
                {
                    country:'ترکیه',
                    farsiName:'وان',
                    propertyDestinationId:'512',
                    count:91,
                    city:'Wan'
                },
                {
                    country:'ترکیه',
                    farsiName:'آنتالیا',
                    propertyDestinationId:'512',
                    count:108,
                    city:'Antalia'
                },
                {
                    country:'ترکیه',
                    farsiName:'ازمیر',
                    propertyDestinationId:'512',
                    count:105,
                    city:'Ezmir'
                },
                {
                    country:'امارات متحده عربی',
                    farsiName:'دبی',
                    propertyDestinationId:'512',
                    count:346,
                    city:'Doubai'
                },
                {
                    country:'آذربایجان',
                    farsiName:'باکو',
                    propertyDestinationId:'512',
                    count:157,
                    city:'Baku'
                },
                {
                    country:'فرانسه',
                    farsiName:'پاریس',
                    propertyDestinationId:'512',
                    count:263,
                    city:'Paris'
                },
                {
                    country:'ارمنستان',
                    farsiName:'ایروان',
                    propertyDestinationId:'512',
                    count:64,
                    city:'Iravan'
                },
                {
                    country:'گرجستان',
                    farsiName:'تفلیس',
                    propertyDestinationId:'512',
                    count:78,
                    city:'Teflis'
                }

            ],
                searchTerm :'',
                cityCode:'421',
                hotelName:'',
                displayList:'none'
            }
        }
        
        render(){
            return(
                <React.Fragment>
                     <input type="text" id="hotelName" onChange={(e)=>this.search(e)} onClick={(e)=>{this.displayList(e);this.setState({displayList:'block'})}} className={this.props.className} placeholder={this.props.Placeholder} autocomplete="off" value={(this.state.hotelName) ? this.state.hotelName :'' } required/>
     
                     <input type="hidden"  name="cityCode" id="cityCode" value={this.state.cityCode} />
     
                     <ul id="myUL"  style={{display: this.state.displayList}} className="myUL ui-menu ui-widget ui-widget-content ui-autocomplete ui-front">
                         {this.props.children}
                         
                        


                         {this.state.hotels.map((hotel)=>{
                             return (<li className="ui-menu-item" onClick={()=>this.setState({cityCode:hotel.propertyDestinationId,searchTerm:'',hotelName:hotel.city,displayList:'none'})}>
                                        <a class="airports ui-menu-item-wrapper">
                                             <span>{hotel.count} اقامتگاه </span>{hotel.farsiName} - {hotel.country}- {hotel.city}
                                        </a>
                                    </li>)
                         })}   
                     </ul>
                </React.Fragment> 
             ); 
        }

        displayList(e){
            if(this.state.hotelName){

                this.setState({hotelName:''})
                // this.setState({hotelName:'',airports:[]})
            }else{
                this.setState({displayList:'block'})
            }
        }
        search=(e)=>{
            this.setState({searchTerm : e.target.value,hotelName:e.target.value},()=>{
                
                if(this.state.searchTerm.length >=3){
                    this.setState({displayList:'block'})
                    axios.post('/cityHotel', {
                        q:this.state.searchTerm 
                    })
                    .then( (response)=> {
                        this.setState({
                            hotels:response.data
                        }); 
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                    //   console.log('hello')
                    //   console.log(this.state.hotels)
                }else{
                    this.setState({displayList:'none'})
                }
            });
        }
       
}//component function 

    
export default HotelSelector;