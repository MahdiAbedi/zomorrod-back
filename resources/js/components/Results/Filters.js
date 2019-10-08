import React from 'react';
import {airlineName} from './Functions'

class Filters extends React.PureComponent{
    constructor(props){
        super(props)
    }

    checkCharter=(charter)=>{
        this.props.checkCharter(charter);
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
                                    <input type="checkbox" name="check1" id="systemi" onClick={()=>this.checkCharter(false)}/>
                                    <label htmlFor="systemi">سیستمی</label>
                                    <span className="checkbox-spanner selected"></span>
                                </div>
                                <div>
                                    <input type="checkbox" name="check1" id="charter" onClick={()=>this.checkCharter(true)}/>
                                    <label htmlFor="charter">چارتر</label>
                                    <span className="checkbox-spanner"></span>
                                </div>
                            </div>
        
                        </section>
                        {/*
                        <!-- تعداد توقف --> */}
                        <section className="panel">
                            <header className="panel-title flex-between">
                                <span>تعداد توقف</span>
                                <a href="#"><i className="fas fa-chevron-down"></i></a>
                            </header>
                            <div className="panel-body">
                                <div>
                                    <input type="radio" name="check1" id="radio1"/>
                                    <label htmlFor="radio1">مستقیم</label>
                                </div>
                                <div>
                                    <input type="radio" name="check1" id="radio2" checked/>
                                    <label htmlFor="radio2">یک توقف</label>
                                </div>
                                <div>
                                    <input type="radio" name="check1" id="radio3"/>
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
                                    <input type="checkbox" name="check1" id="Economy" checked/>
                                    <label htmlFor="Economy">Economy</label>
                                    <span className="checkbox-spanner selected"></span>
                                </div>
                                <div>
                                    <input type="checkbox" name="check1" id="Bussiness"/>
                                    <label htmlFor="Bussiness">Bussiness</label>
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
                                   return   <div className="airline-filter flex-between">
                                                <input type="checkbox" name={`${item}`} id={`${item}`}/>
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