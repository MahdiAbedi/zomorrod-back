import hotels from './Hotel.json';

class HotelResutls extends React.Component{
constructor(props){
        super(props);
        this.state = {
            hotels:[],
            isLoading:true,
            tempHotels:[]
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

           // this.getAirlines()

        })
       .catch((error)=>{
          console.log(error);
       });
    }
    //######################## Component Did Mount ######################################################
    componentDidMount(){
       this.getTickets();
    }

    render(){
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
                       return (<div className="hotels-container">
                            <img src="/img/hotel/0.jpg" alt=""/>
                            <div className="hotels_preview flex-column">
                                <div className="hotels_preview_top">
                                    <div className="right">
                                        <h2>Deluxe City Hotel</h2>
                                        <span className="stars">
                                            <i className="fa fa-star green"></i>
                                            <i className="fa fa-star green"></i>
                                            <i className="fa fa-star green"></i>
                                            <i className="far fa-star green"></i>
                                            <i className="far fa-star green"></i>
                                        </span>
                                        <p>رتبه : 7.3 | خوب |</p>
                                        <a href="#" className="green">1 X DELUXE GUEST ROOM/1 KING CITY VIEW</a>
                                        <p>صبحانه از بوفه رایگان هر روز از 8 تا 11 صبح</p>
                                        {hotel.Offer}
                                    </div>
                                    <div className="left">
                                        <p><i className="fas fa-map-marker-alt"></i> نمایش هتل روی نقشه</p>
                                        <small className="green">باکو Nsimi</small>
                                        <br/>
                                        <p>شروع قیمت برای 7 شب از :</p>
                                        <p className="green" name="money">74,880,000 تومان</p>
                                    </div>
                                </div>
                                <div className="hotels_detail green">
                                    مشاهده و انتخاب اتاق
                                </div>
                            </div>
                        </div>)
                    })}
                    
                </section>
            </section>
            </>
        )
    }
}


if(document.querySelector('#HotelResutls')){

    ReactDOM.render(<HotelResutls/> , document.querySelector('#HotelResutls'));
}