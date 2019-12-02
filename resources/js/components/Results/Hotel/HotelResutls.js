// import Fakehotels from './Hotel.json';
import LoadingModal from '../LoadingModal';

class HotelResutls extends React.Component{
constructor(props){
        super(props);
        this.state = {
            hotels:[],
            isLoading:true,
            tempHotels:[],
            stars:''
        };

    }

     hotelFarsiName   =  localStorage.getItem('hotelFarsiName');
     hotelCountry     =  localStorage.getItem('hotelCountry');
     hotelEnglishName =  localStorage.getItem('hotelEnglishName');
     hotel_nights     =  localStorage.getItem('hotel_nights');



    //####################### دریافت بلیط از سرور ######################################################
    getTickets=()=>{
        axios.post('/hotels',{

            CityCode        : localStorage.getItem('cityCode'),
            Occupancies   : JSON.parse(localStorage.getItem('hotelPassengersList')),
            checkIn       : PartoDateFormat(localStorage.getItem('hotel_checkIn')),
            checkOut      : PartoDateFormat(localStorage.getItem('hotel_checkOut')),
        })
        .then(response => {
            // this.setState({hotels:Fakehotels.PricedItineraries,isLoading:false,tempHotels:[...this.state.hotels]})
             this.setState({
                hotels:response.data,
                isLoading:false,
                tempHotels:response.data
                
            })

          
            
        })
       .catch((error)=>{
          console.log(error);
       });
    }
    //######################## Component Did Mount ######################################################
    componentDidMount(){
       this.getTickets(); 
    }

    // ######################### Make Start ###############################################################
    makeStar(counter){
        let star=``;
        for (let index = 0; index < counter; index++) {
            star +=`<i class="fa fa-star green"></i>` ;           
        }
        for (let index = 0; index < 5-counter; index++) {
            star +=`<i class="far fa-star green"></i>` ;           
        }
        return {__html: star}
    }


    // ######################## اجرا به صفحه جزییات هتل ##################################################
    showHotel(hotelID){
        localStorage.setItem('hotelID',hotelID);
        // window.location="/hotel/detail/"+hotelID;
        window.open("/hotel/detail/"+ hotelID, "_blank"); 
    }


    
    //#################### انتخاب هتلها براساس ستاره های هتل #############################################
    chooseStars=()=>{
        // this.setState({tempHotels:this.state.hotels})
        // console.log(this.state.tempHotels)
        let stars = [];
        $("input:checkbox[class=StarsCode]:checked").each(function(){
            stars.push(parseInt($(this).val()));
        });
        // console.log(stars)

        if(stars.length==0){
            this.setState({hotels: this.state.tempHotels})
        }else{
            this.setState({hotels : this.state.tempHotels.filter(
                function(hotel){
                    return stars.includes(hotel.Rating)
                }
            )}) 
        }
         
}
    //#################### انتخاب هتلها براساس ستاره های هتل #############################################
    choosePriceRange = () => {
        let priceRange = [];
        $("input:checkbox[class=PriceRangeCode]:checked").each(function () {
            priceRange.push(parseInt($(this).val()));
        });
        // console.log(stars)

        if (priceRange.length == 0) {
            this.setState({
                hotels: this.state.tempHotels
            })
        } else {
            this.setState({
                hotels: this.state.tempHotels.filter((hotel) => {
                        // return hotel.NetRate >10000000
                        if(0 in priceRange){
                            console.log(hotel.NetRate)
                            return hotel.NetRate > 0 && hotel.NetRate <5000000
                        }
                        if(5 in priceRange){
                            return hotel.NetRate > 5000000 && hotel.NetRate <15000000
                        }
                        
                    }

                )
            })
        }

    }



    //#################### فیلتر پروازها بر اساس ظرفیت پرواز #############################################
    filterByPrice=(accending="true")=>{
        if(accending){
            this.setState({tickets : this.state.hotels.sort(
                function(a,b){
                    if(a.NetRate < b.NetRate){
                        return -1;
                    }
                    if(a.NetRate > b.NetRate){
                        return 1;
                    }
                    
                }
            )}) 
        }else{
            this.setState({tickets : this.state.hotels.sort(
                function(a,b){
                    if(a.NetRate < b.NetRate){
                        return 1;
                    }
                    if(a.NetRate > b.NetRate){
                        return -1;
                    }
                    
                }
            )}) 
        }
        
    }

    //############################# Render() ###############################################################
    render(){

        if(this.state.hotels.length==0){
                return(
                    <section className="result-panel container">
                       

                       {(this.state.isLoading) ? <LoadingModal/> :'جستجوی شما نتیجه ای در بر نداشت'}
                    </section>
                
                    );
            }else{

                 return(
                    <>
                        {/* <!-- فیلترها --> */}
                        <aside className="filters">
                            <section className="flex">
                                <button className="reset">لغو فیلترها</button>
                 <p>نتایج جستجو <span>{this.state.hotels.length}</span></p>
                            </section>
                            {/* <!-- جستجوی هتل --> */}
                            <section className="panel">
                                <header className="panel-title flex-between">
                                    <span>جستجوی هتل</span>
                                    <a href="#"><i className="fas fa-chevron-down"></i></a>
                                </header>
                                <div className="panel-body">
                                    <input type="text" placeholder="جستجو بر اساس نام هتل" className="border"/>
                                </div>

                            </section>
                            {/* <!-- درجه هتل --> */}
                            <section className="panel">
                                <header className="panel-title flex-between">
                                    <span>درجه هتل</span>
                                    <a href="#"><i className="fas fa-chevron-down"></i></a>
                                </header>
                                <div className="panel-body">

                                    <div>
                                        <input type="checkbox"id="check5" value="5"  className="StarsCode" onClick={()=>{this.chooseStars()}}/>
                                        <label for="check5">
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="checkbox"id="check4" value="4"  className="StarsCode" onClick={()=>{this.chooseStars()}}/>
                                        <label for="check4">
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="checkbox"  id="check3" value="3"  className="StarsCode" onClick={()=>{this.chooseStars()}}/>
                                        <label for="check3">
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="check2" value="2"  className="StarsCode" onClick={()=>{this.chooseStars()}}/>
                                        <label for="check2">
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                
                                                <i className="far fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="check1" value="1"  className="StarsCode" onClick={()=>{this.chooseStars()}}/>
                                        <label for="check1">
                                                <i className="fa fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="checkbox"  id="check0" value="0"  className="StarsCode" onClick={()=>{this.chooseStars()}}/>
                                        <label for="check0">رتبه بندی نشده</label>
                                    </div>
                                </div>

                            </section>

                            {/* <!-- رنج قیمتی هتل --> */}
                            <section className="panel">
                                <header className="panel-title flex-between">
                                    <span>رنج قیمتی هتل (قیمت به ریال)</span>
                                    <a href="#"><i className="fas fa-chevron-down"></i></a>
                                </header>
                                <div className="panel-body">
                                    <div>
                                        <input type="checkbox"  id="price0" value="0" className="PriceRangeCode" onClick={()=>{this.choosePriceRange()}}/>
                                        <label for="price0">0 تا 5,000,000</label>
                                        <span className="checkbox-spanner selected"></span>
                                    </div>
                                    <div>
                                        <input type="checkbox"  id="price1" value="5" className="PriceRangeCode" onClick={()=>{this.choosePriceRange()}}/>
                                        <label for="price1">5,000,000 تا 10,000,000</label>
                                        <span className="checkbox-spanner"></span>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="price2" value="10" className="PriceRangeCode" onClick={()=>{this.choosePriceRange()}}/>
                                        <label for="price2">10,000,000 تا 15,000,000</label>
                                        <span className="checkbox-spanner selected"></span>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="price3" value="15" className="PriceRangeCode" onClick={()=>{this.choosePriceRange()}}/>
                                        <label for="price3">15,000,000 تا 20,000,000</label>
                                        <span className="checkbox-spanner"></span>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="price4" value="20" className="PriceRangeCode" onClick={()=>{this.choosePriceRange()}}/>
                                        <label for="price4">20,000,000 به بالا</label>
                                        <span className="checkbox-spanner selected"></span>
                                    </div>
                                </div>

                            </section>
                            {/* <!-- نوع مکان اقامتی --> */}
                            <section className="panel">
                                <header className="panel-title flex-between">
                                    <span>نوع مکان اقامتی</span>
                                    <a href="#"><i className="fas fa-chevron-down"></i></a>
                                </header>
                                <div className="panel-body">
                                    <div>
                                        <input type="checkbox" name="check1" id="systemi"/>
                                        <label for="systemi">هتل</label>
                                        <span className="checkbox-spanner selected"></span>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="check1" id="charter"/>
                                        <label for="charter">بوتیک هتل</label>
                                        <span className="checkbox-spanner"></span>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="check1" id="systemi"/>
                                        <label for="systemi">ریزورت هتل</label>
                                        <span className="checkbox-spanner selected"></span>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="check1" id="charter"/>
                                        <label for="charter">هتل آپارتمان</label>
                                        <span className="checkbox-spanner"></span>
                                    </div>
                                    
                                </div>

                            </section>
                        
                        </aside>

                    {/* <!-- نتایج --> */}
                    <section className="results ">
                        {/* <!-- قسمت مرتبط سازی نتایج بر اساس قیمت و.. و نمایش تاریخ --> */}
                        <section className="sorting flex">
                            <section className="sort">
                                <ul className="flex">
                                    <li><a href="#" onClick={()=>this.filterByPrice(true)}><i className="fas fa-sort-amount-up-alt"></i>پر فروش ترین ها</a></li>
                                    <li><a href="#" onClick={()=>this.filterByPrice(true)}><i className="fas fa-sort-amount-down-alt"></i>کمترین قیمت</a></li>
                                    <li><a href="#" onClick={()=>this.filterByPrice(false)}><i className="fas fa-sort-amount-up-alt"></i>بیشترین قیمت</a></li>
                                </ul>
                            </section>
                            <section className="date">
                                <ul className="flex">
                                    <li><a href="#"><i className="fas fa-star"></i>رتبه</a></li>
                                    <li className="current-date"><a href="#">98/05/08</a></li>
                                    <li><a href="#">پشنهاد ویژه<i className="fas fa-thumbs-up"></i></a></li>
                                </ul>
                            </section>
                        </section>
                        {/* <!-- بخش نمایش تیکت ها --> */}
                        <section className="hotels">
                            {/* <!-- یک تیکت تک --> */}

                            {this.state.hotels.map((hotel,index)=>{
                            return (<div className="hotels-container" key={index}>
                                    <img src={`https://hotelimage.partocrs.com/${hotel.HotelId}/main.jpg`} alt=""/>
                                    <div className="hotels_preview flex-column">
                                        <div className="hotels_preview_top">
                                            <div className="right">
                                                <h2>{hotel.Name}</h2>
                                                <span className="stars" id="stars" dangerouslySetInnerHTML={this.makeStar(hotel.Rating)}>
                                                </span>
                                                <p>رتبه : {hotel.Rating || 0} | {farsiRate(hotel.Rating)} |</p>
                                                <p>امتیاز کاربران : {hotel.ReviewScore || 0}</p>
                                                <a href="#" className="green">{hotel.Rooms[0].Name}</a>
                                                <p>{hotel.Offer}</p>
                                                
                                            </div>
                                            <div className="left">
                                               
                                                <a target="_blank" href={`https://www.google.com/maps/search/?api=1&query=${hotel.Longitude},${hotel.Latitude}`}><i className="fas fa-map-marker-alt"></i> نمایش هتل روی نقشه</a>
                                                <small className="green">{this.hotelCountry}-{this.hotelFarsiName}-{this.hotelEnglishName}</small>
                                                <br/>
                                                <p>شروع قیمت برای {this.hotel_nights} شب از :</p>
                                                <p className="green money" name="money">{formatCurrency(hotel.NetRate)} ریال</p>
                                            </div>
                                        </div>
                                        <a className="hotels_detail green" target="_blank" style={{cursor:'pointer'}} onClick={()=>this.showHotel(hotel.HotelId)}  >
                                            مشاهده و انتخاب اتاق
                                        </a>
                                    </div>
                                </div>)
                            })}
                            
                        </section>
                    </section>
                    </>
                )

            }//else
    }
}


if(document.querySelector('#HotelResutls')){

    ReactDOM.render(<HotelResutls/> , document.querySelector('#HotelResutls'));
}