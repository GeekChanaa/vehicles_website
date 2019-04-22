@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="imagef">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('num_tel') ? ' has-error' : '' }}">
                            <label for="num_tel" class="col-md-4 control-label">Numero de Tel</label>

                            <div class="col-md-6">
                                <input id="num_tel" type="text" class="form-control" name="num_tel" value="{{ old('num_tel') }}" required autofocus>

                                @if ($errors->has('num_tel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('num_tel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="col-md-4 control-label">Country</label>

                            <div class="col-md-6">
                                <select type="text" class="form-control" name="country" required autofocus>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Bosnia and Herz.">Bosnia and Herz.</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Timor-Leste">Timor-Leste</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Eq. Guinea">Eq. Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="W. Sahara">W. Sahara</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Solomon Is.">Solomon Is.</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Israel">Israel</option>
                                    <option value="France">France</option>
                                    <option value="Somaliland">Somaliland</option>
                                    <option value="Finland">Finland</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Falkland Is.">Falkland Is.</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Kosovo">Kosovo</option>
                                    <option value="Côte d\'Ivoire">Côte d\'Ivoire</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="China">China</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Chile">Chile</option>
                                    <option value="N. Cyprus">N. Cyprus</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Central African Rep.">Central African Rep.</option>
                                    <option value="Dem. Rep. Congo">Dem. Rep. Congo</option>
                                    <option value="Czech Rep.">Czech Rep.</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="S. Sudan">S. Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Korea">Korea</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Dem. Rep. Korea">Dem. Rep. Korea</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Dominican Rep.">Dominican Rep.</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="United States">United States</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lao PDR">Lao PDR</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Fr. S. Antarctic Lands">Fr. S. Antarctic Lands</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Libya">Libya</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="India">India</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Mozambique">Mozambique</option>
                                </select>

                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
