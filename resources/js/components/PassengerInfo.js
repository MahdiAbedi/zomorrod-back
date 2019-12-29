// import DateSelector from '../components/DateSelector';


//Passport Should be valid aftar than 6 months from last flight segment.
function checkPassportValidation(e){
    if(e.target.value.length == 10){
        let a = moment(shamsiToMiladi(e.target.value));
        let b = localStorage.getItem('departureTime');
        if(a.diff(b,'days') < 180){
            FlashMessage('پاسپورت شما از زمان سفر کمتر از 6 ماه اعتبار دارد لذا امکان رزو پرواز را نخواهید داشت')
        }
    }
}


    
function PassengerInfo({title="بزرگسال",passengerType=1}){
    //گرفتن اطلاعات تیکت که در مرحله انتخاب بلیط تو مرورگر ذخیره شده


    //Child passenger should be under 12 years after last flight segment.
    function checkChildAge(e){

        {/* passengerType adt=1,chd=2,inf=3 */}

        if(e.target.value.length == 10){
            let a = moment(shamsiToMiladi(e.target.value));
            let b = moment(localStorage.getItem('departureTime'));
            // alert(b.diff(a,'years'))

            switch (passengerType) {
                case 1:
                    if(b.diff(a,'years') < 12){
                        FlashMessage('بزرگسال همراه شما در زمان سفر کمتر از 12 سال سن دارد و بزرگسال محسوب نمیشود،لذا بلیط کودک برای وی تهیه بفرمایید.')
                    }
                    break;
                case 2:
                    // alert(b.diff(a,'years'))
                    if(b.diff(a,'years') > 12){
                        FlashMessage('کودک همراه شما در زمان سفر بیش از 12 سال سن دارد و بزرگسال محسوب میشود،لذا بلیط بزرگسال برای وی تهیه بفرمایید.')
                    }
                    break;
                case 3:
                    if(b.diff(a,'years') > 2){
                        FlashMessage('نوزاد همراه شما در زمان سفر بیش از 2 سال سن دارد و کودک محسوب میشود،لذا بلیط کودک برای وی تهیه بفرمایید.')
                    }
                    break;

                default:
                    break;
            }
            
            
        }
    }
    
    
    return(
    <section className="tabs">
        <div className="tabs-title">
            <div className="tab-title">
                <i className="green fas fa-times-circle"></i>
                <label>{title}</label>
            </div>


        </div>
        
            <div className="tab-desctiption">
                <div className="fields">
                    {/* فیلدهای مخفی */}
                    {/* passengerType adt=1,chd=2,inf=3 */}
                    <input type="hidden" name="PassengerType[]" className="PassengerType" value={passengerType}/>
                    <div className="field">
                        <label >نام(لاتین)</label>
                        <input type="text" name="PassengerFirstName[]" value="Mahdi" className="PassengerFirstName" />
                    </div>
                    <div className="field">
                        <label >نام خانوادگی(لاتین)</label>
                        <input type="text" name="PassengerLastName[]" value="Abedi" className="PassengerLastName" />
                    </div>
                    <div className="field">
                        <label >جنسیت</label>
                        <select name="gender[]" className="gender">
                            <option value="0">آقا</option>
                            <option value="1">خانم</option>
                        </select>
                    </div>
                    <div className="field">
                        <label >تاریخ تولد</label>
                        <input type="text" name="DateOfBirth[]" placeholder="مثال: 1370/06/08" value="1370/06/08"  className="DateOfBirth" maxLength="10" onChange = {checkChildAge} />
                        {/* <DateSelector name="DateOfBirth[]"  className="DateOfBirth"/> */}
                    </div>
                    <div className="field">
                        <label >کد ملی</label>
                        <input type="text" name="PassengerCodeMeli[]"  className="PassengerCodeMeli" value="0016183444"/>
                    </div>
                    <div className="field">
                        <label >کشور صادر کننده پاسپورت</label>
                        
                        <select name="Country[]" className="Country select2">
                            <option value="AF">Afghanistan</option>
                            <option value="AL">Albania</option>
                            <option value="AD">Andorra</option>
                            <option value="AI">Anguilla</option>
                            <option value="AR">Argentina </option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BT">Bhutan</option>
                            <option value="BR">Brazil</option>
                            <option value="BG">Bulgaria</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo</option>
                            <option value="CI">Cote D'Ivoire (IvoryCoast)</option>
                            <option value="HR">Croatia</option>
                            <option value="CU">Cuba</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">DANMARK</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DZ">DZ</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="EE">Estonia</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option>
                            <option value="GH">Ghana</option>
                            <option value="GR">Greece</option>
                            <option value="GY">Guyana</option>
                            <option value="HN">Honduras</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IR " selected>IRAN</option>
                            <option value="IQ">Iraq</option>
                            <option value="IE">Ireland</option>
                            <option value="IT">Italy</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KI">Kiribati</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LB">Lebanon</option>
                            <option value="LR">Liberia</option>
                            <option value="MK">Macedonia</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="MT">Malta</option>
                            <option value="MX">Mexico</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="KP">North Korea</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PS">Palestine</option>
                            <option value="PA">Panama</option>
                            <option value="PH">Philippines</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="QA">Qatar</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russian</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="RS">Serbia</option>
                            <option value="SC">Seychelles</option>
                            <option value="SG">Singapore</option>
                            <option value="SO">Somalia</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SD">Sudan</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="SY">Syrian Arab Republic</option>
                            <option value="TW">Taiwan, Province ofChina</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TH">Thailand</option>
                            <option value="TN">Tunisia</option>
                            <option value="TR">Turkey</option>
                            <option value="UA">Ukraine</option>
                            <option value="GB">United Kingdom</option>
                            <option value="NY">United States</option>
                            <option value="UY">Uruguay</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VE">Venezuela</option>
                            <option value="VN">Vietnam</option>
                            <option value="YE">Yemen</option>
                            <option value="ZM">Zambia</option>
                        </select>
                    </div>
                
                    <div className="field">
                        <label >شماره پاسپورت</label>
                        <input type="text" name="PassportNumber[]" className="PassportNumber" value="a23456789"/>
                    </div>

                    {/* <div className="field">
                        <label >تاریخ صدور پاسپورت</label>
                        <DateSelector name="IssueDate[]" className="IssueDate" />
                    </div> */}
                    <div className="field">
                        <label >تاریخ انقضا پاسپورت</label>
                        <input type="text" name="ExpiryDate[]" placeholder="مثال:1400/06/08" value="1400/06/08" maxLength="10" className="ExpireDate" onChange = {checkPassportValidation}/>
                        {/* <DateSelector name="ExpiryDate[]" className="ExpireDate" /> */}
                    </div>

                </div>

            </div>
    </section>
    );
}

export default PassengerInfo;