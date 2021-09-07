<?php include 'components/nav.php' ?> 

        <div class="content-wrapper">

            <div class="breadcrumb-wrap bg-f br-1">
                <div class="overlay bg-black op-9"></div>
                <img src="assets/img/shape-1.png" alt="Image" class="br-shape-1">
                <img src="assets/img/shape-2.png" alt="Image" class="br-shape-2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-title">
                                <h2>Make A Reservation</h2>
                                <ul class="breadcrumb-menu list-style">
                                    <li><a href="index.html">Home </a></li>
                                    <li>Reservation</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <section class="reservation-wrap pt-100 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="reservation-box-wrap">
                                <div class="reservation-form" style="width: 50%;">
                                    <h4>Резервирай маса</h4>
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="name">Име</label>
                                            <input type="text" name="name" id="name" placeholder="Ivan Ivanov">
                                        </div>
                                        <div class="form-group">
                                            <label for="person">Колко човека</label>
                                            <select name="person" id="person">
                                                <option value="1">1 Човека</option>
                                                <option value="2">2 Човека</option>
                                                <option value="3">3 Човека</option>
                                                <option value="4">4 Човека</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="date">За кога?</label>
                                            <input type="date" name="date" id="date">
                                        </div>
                                        <a href="reservation.html" class="btn style1 mt-10">Резервирай</i></a>
                                    </form>
                                </div>
                                <div class="opening-hrs" style="width: 50%;">
                                    <div class="overlay op-9 bg-black"></div>
                                    <h4>Opening Hours</h4>
                                    <ul class="office-schedule  list-style">
                                        <li>
                                            <p>Monday</p>
                                            <p>09:00 - 18:00</p>
                                        </li>
                                        <li>
                                            <p>Tuesday</p>
                                            <p>10:00 - 18:00</p>
                                        </li>
                                        <li>
                                            <p>Wednesday</p>
                                            <p>11:00 - 18:00</p>
                                        </li>
                                        <li>
                                            <p>Thursday</p>
                                            <p>12:00 - 18:00</p>
                                        </li>
                                        <li>
                                            <p>Friday</p>
                                            <p>14:00 - 18:00</p>
                                        </li>
                                        <li>
                                            <p>Saturday</p>
                                            <p>14:00 - 18:00</p>
                                        </li>
                                        <li>
                                            <p>Sunday</p>
                                            <p>Closed</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
<?php include 'components/footer.php' ?> 
