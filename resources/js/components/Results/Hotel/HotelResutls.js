import hotels from './Hotel.json';

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
        axios.post('/hotels',{
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
        })
        .then(response => {
            // let myTickets=response.data;
            // this.setState({tickets:myTickets.PricedItineraries})
             this.setState({
                hotels:response.data,
                isLoading:false,
            })
            console.log(this.state.hotels)
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
    showHotel(){
        alert('hello');
    }

    //############################# Render() ###############################################################
    render(){

        if(this.state.hotels.length==0){
                return(
                    <section className="result-panel container">
                        test
                    </section>
                
                    );
            }else{

                 return(
                    <>
                        {/* <!-- فیلترها --> */}
                        <aside className="filters">
                            <section className="flex">
                                <button className="reset">لغو فیلترها</button>
                                <p>نتایج جستجو <span>16</span></p>
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
                                        <input type="checkbox" name="check1" id="check1"/>
                                        <label for="check1">
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="check1" id="check1"/>
                                        <label for="check1">
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="check1" id="check1"/>
                                        <label for="check1">
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="check1" id="check1"/>
                                        <label for="check1">
                                                <i className="fa fa-star green"></i>
                                                <i className="fa fa-star green"></i>
                                                
                                                <i className="far fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="check1" id="check1"/>
                                        <label for="check1">
                                                <i className="fa fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                                <i className="far fa-star green"></i>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="check1" id="check1"/>
                                        <label for="check1">رتبه بندی نشده</label>
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
                                        <input type="checkbox" name="check1" id="systemi"/>
                                        <label for="systemi">0 تا 5,000,000</label>
                                        <span className="checkbox-spanner selected"></span>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="check1" id="charter"/>
                                        <label for="charter">5,000,000 تا 10,000,000</label>
                                        <span className="checkbox-spanner"></span>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="check1" id="systemi"/>
                                        <label for="systemi">10,000,000 تا 15,000,000</label>
                                        <span className="checkbox-spanner selected"></span>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="check1" id="charter"/>
                                        <label for="charter">15,000,000 تا 20,000,000</label>
                                        <span className="checkbox-spanner"></span>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="check1" id="systemi"/>
                                        <label for="systemi">20,000,000 به بالا</label>
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
                                    <li><a href="#"><i className="fas fa-sort-amount-up-alt"></i>پر فروش ترین ها</a></li>
                                    <li><a href="#"><i className="fas fa-sort-amount-down-alt"></i>کمترین قیمت</a></li>
                                    <li><a href="#"><i className="fas fa-sort-amount-up-alt"></i>بیشترین قیمت</a></li>
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
                                                    {/* <i class="fa fa-star green"></i>
                                                    <i class="fa fa-star green"></i>
                                                    <i class="fa fa-star green"></i>
                                                    <i class="far fa-star green"></i>
                                                    <i class="far fa-star green"></i> */}
                                                    
                                                    
                                                </span>
                                                <p>رتبه : {hotel.Rating || 0} | {farsiRate(hotel.Rating)} |</p>
                                                <p>امتیاز کاربران : {hotel.ReviewScore || 0}</p>
                                                <a href="#" className="green">{hotel.Rooms[0].Name}</a>
                                                <p>{hotel.Offer}</p>
                                                
                                            </div>
                                            <div className="left">
                                               
                                                <a target="_blank" href={`https://www.google.com/maps/search/?api=1&query=${hotel.Longitude},${hotel.Latitude}`}><i className="fas fa-map-marker-alt"></i> نمایش هتل روی نقشه</a>
                                                <small className="green">باکو Nsimi</small>
                                                <br/>
                                                <p>شروع قیمت برای 7 شب از :</p>
                                                <p className="green money" name="money">{formatCurrency(hotel.NetRate)} ریال</p>
                                            </div>
                                        </div>
                                        <a className="hotels_detail green" onClick={()=>this.showHotel()}  >
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