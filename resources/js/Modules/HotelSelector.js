import './MultiSelect.css'
class HotelSelector extends React.Component{

        constructor(props){
            super(props);
            this.state={
                hotels:[
                {
                    country:'ترکیه',
                    farsiName:'استانبول',
                    CityId:'924',
                    count:325,
                    city:'Istanbul'
                },
                {
                    country:'ترکیه',
                    farsiName:'وان',
                    CityId:'30976',
                    count:91,
                    city:'Wan'
                },
                {
                    country:'ترکیه',
                    farsiName:'آنتالیا',
                    CityId:'930',
                    count:108,
                    city:'Antalia'
                },
                {
                    country:'ترکیه',
                    farsiName:'ازمیر',
                    CityId:'1789',
                    count:105,
                    city:'Izmir'
                },
                {
                    country:'امارات متحده عربی',
                    farsiName:'دبی',
                    CityId:'968',
                    count:346,
                    city:'Dubai'
                },
                {
                    country:'آذربایجان',
                    farsiName:'باکو',
                    CityId:'17123',
                    count:157,
                    city:'Baku'
                },
                {
                    country:'فرانسه',
                    farsiName:'پاریس',
                    CityId:'93',
                    count:263,
                    city:'Paris'
                },
                {
                    country:'ارمنستان',
                    farsiName:'ایروان',
                    CityId:'23546',
                    count:64,
                    city:'Yerevan'
                },
                {
                    country:'گرجستان',
                    farsiName:'تفلیس',
                    CityId:'17122',
                    count:78,
                    city:'Tbilisi'
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
                             return (<li className="ui-menu-item" onClick={()=>this.setState({cityCode:hotel.CityId,searchTerm:'',hotelName:hotel.city,displayList:'none'})}>
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