
class Filters extends React.PureComponent{
    constructor(props){
        super(props)
    }
    //############## چک کردن چارتر بودن یا نبودن پرواز ##########################
    checkCharter=(charter)=>{
        this.props.checkCharter(charter);
    }

    //############## فیلتر پروازها براساس تعداد توقف بین راه ###################
    stopCount = (count) =>{
        this.props.StopCount(count);
    }

    //############# فیلتر پروازها براساس کد ایرلاین ##############################
    chooseAirline = (airlineCode) =>{
        let airlines = [];
        $("input:checkbox[class=airlineCode]:checked").each(function(){
            airlines.push($(this).val());
        });

        this.props.chooseAirline(airlines);
    }
    //############# فیلتر پروازها براساس کد کابین ##############################
    chooseCabinType = (CabinType) =>{
        let CabinTypes = [];

        $("input:checkbox[class=CabinType]:checked").each(function(){
            CabinTypes.push($(this).val());
        });

        this.props.chooseCabinType(CabinTypes);
    }

    render(){
        return(
        <aside className="filters">
            <section className="flex">
                <button className="reset">لغو فیلترها</button>
                
                <p>نتایج جستجو <span>16</span></p>
            </section>
            {/*
            <!-- ساعت حرکت --> */}
            <section className="panel">
                <header className="panel-title flex-between">
                    <span>زمان پرواز</span>
                    <a href="#"><i className="fas fa-chevron-down"></i></a>
                </header>
                <div className="panel-body">
                    <div>
                        <input type="checkbox" name="check1" id="check1"/>
                        <label htmlFor="check1">از ساعت 6:00 تا 10:00</label>
                    </div>
                    <div>
                        <input type="checkbox" name="check1" id="check1"/>
                        <label htmlFor="check1">از ساعت 6:00 تا 10:00</label>
                    </div>
                    <div>
                        <input type="checkbox" name="check1" id="check1"/>
                        <label htmlFor="check1">از ساعت 6:00 تا 10:00</label>
                    </div>
                    <div>
                        <input type="checkbox" name="check1" id="check1"/>
                        <label htmlFor="check1">از ساعت 6:00 تا 10:00</label>
                    </div>
                </div>

            </section>

            {/*<!-- نوع فروش --> */}
            <section className="panel">
                <header className="panel-title flex-between">
                    <span>نوع فروش</span>
                    <a href="#"><i className="fas fa-chevron-down"></i></a>
                </header>
                <div className="panel-body">
                    <div>
                        <input type="radio" name="charter" id="systemi" onClick={()=>this.checkCharter(false)}/>
                        <label htmlFor="systemi">سیستمی</label>
                        <span className="checkbox-spanner selected"></span>
                    </div>
                    <div>
                        <input type="radio" name="charter" id="charter" onClick={()=>this.checkCharter(true)}/>
                        <label htmlFor="charter">چارتر</label>
                        <span className="checkbox-spanner"></span>
                    </div>
                </div>

            </section>
            {/*
            <!-- تعداد توقف --> */}
            <section className="panel" style={{display:this.props.inline ? 'none' :''}}>
                <header className="panel-title flex-between">
                    <span>تعداد توقف</span>
                    <a href="#"><i className="fas fa-chevron-down"></i></a>
                </header>
                <div className="panel-body">
                    <div>
                        <input type="radio" name="check1" id="radio1" onClick={()=>this.stopCount(0)}/>
                        <label htmlFor="radio1">مستقیم</label>
                    </div>
                    <div>
                        <input type="radio" name="check1" id="radio2"  onClick={()=>this.stopCount(1)}/>
                        <label htmlFor="radio2">یک توقف</label>
                    </div>
                    <div>
                        <input type="radio" name="check1" id="radio3"  onClick={()=>this.stopCount(2)}/>
                        <label htmlFor="radio3">دو توقف و بیشتر</label>
                    </div>

                </div>

            </section>
            {/*
            <!-- کلاس پروازی --> */}
            <section className="panel">
                <header className="panel-title flex-between">
                    <span>کلاس پروازی</span>
                    <a href="#"><i className="fas fa-chevron-down"></i></a>
                </header>
                <div className="panel-body">
                    <div>
                        <input type="checkbox" className="CabinType" name="Economy" id="Economy" value="1" onClick={()=>this.chooseCabinType()}/>
                        <label htmlFor="Economy">Economy</label>
                        <span className="checkbox-spanner selected"></span>
                    </div>
                    <div>
                        <input type="checkbox" className="CabinType" name="Premium Economy" id="Premium Economy"  value="2" onClick={()=>this.chooseCabinType()}/>
                        <label htmlFor="Premium Economy">Premium Economy</label>
                        <span className="checkbox-spanner"></span>
                    </div>
                    <div>
                        <input type="checkbox" className="CabinType" id="Business" name="Business" value="3" onClick={()=>this.chooseCabinType()}/>
                        <label htmlFor="Business">Business</label>
                        <span className="checkbox-spanner selected"></span>
                    </div>
                    <div>
                        <input type="checkbox" className="CabinType" id="Premium Business" name="Premium Business" value="4" onClick={()=>this.chooseCabinType()}/>
                        <label htmlFor="Premium Business">Premium Business</label>
                        <span className="checkbox-spanner "></span>
                    </div>
                    <div>
                        <input type="checkbox" className="CabinType" id="First" value="First" value="5" onClick={()=>this.chooseCabinType()}/>
                        <label htmlFor="First">First</label>
                        <span className="checkbox-spanner selected"></span>
                    </div>
                    <div>
                        <input type="checkbox" className="CabinType" id="Premium First" name="Premium First" value="6" onClick={()=>this.chooseCabinType()}/>
                        <label htmlFor="Premium First">Premium First</label>
                        <span className="checkbox-spanner"></span>
                    </div>

                </div>

            </section>
            {/*
            <!-- شرکتهای هواپیمایی --> */}
            <section className="panel">
                <header className="panel-title flex-between">
                    <span>شرکتهای هواپیمایی</span>
                    <a href="#"><i className="fas fa-chevron-down"></i></a>
                </header>
                <div className="panel-body">
                    {/*<!-- شرکت هواپیما --> */}
                    {this.props.airlines.map((item,index)=>{
                        return   <div className="airline-filter flex-between" key={index}>
                                    <input className="airlineCode" type="checkbox" value={`${item}`} id={`${item}`} onClick={()=>{this.chooseAirline()}}/>
                                    <label htmlFor={`${item}`} className="flex">
                                        <img src={`img/airlines-logo/${item}.png`} alt=""/>
                                        <p>{airlineName(item)}</p>
                                        <p className="price"><span>..</span>.</p>
                                    </label>
                                </div>
                    })}

                </div>

            </section>
        </aside>
                    
        
        )
    }
}

export default Filters;