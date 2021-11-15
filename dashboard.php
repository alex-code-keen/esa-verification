<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Support Pets</title>
    <link rel="stylesheet" href="./fonts/montserrat/Montserrat.css" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/materialize.min.css" />
    <link rel="stylesheet" href="./css/main.css" />
  </head>

  <body>
    <div class="container-fluid main-wrapper">
      <header class="header">
        <!-- -------------------  Left menu ----------------------->
        <ul class="left-menu sidenav sidenav-fixed " id="left-menu">
          <a href="#" class="left-menu-logo"></a>
          <li class="left-menu__item">
            <a
              href="javascript:void(0);"
              class="menu-link nav-tooltipped"
              data-position="right"
              data-tooltip="My Profile"
              data-section="profile-section"
            >
              <span class="link-icon icon-profile"></span>
              <span class="menu-link__heading">My Profile</span>
            </a>
          </li>
          <li class="left-menu__item">
            <a
              href="javascript:void(0);"
              class="menu-link nav-tooltipped"
              data-position="right"
              data-tooltip="Refer a Friend"
              data-section="refer-section"
            >
              <span class="link-icon icon-money"></span>
              <span class="menu-link__heading">Refer a Friend</span>
            </a>
          </li>
          <li class="left-menu__item">
            <a
              href="javascript:void(0);"
              class="menu-link nav-tooltipped"
              data-position="right"
              data-tooltip="My Pets"
              data-section="pets-section"
            >
              <span class="link-icon icon-palm"></span>
              <span class="menu-link__heading">My Pets</span>
            </a>
          </li>
          <li class="left-menu__item">
            <a
              href="javascript:void(0);"
              class="menu-link nav-tooltipped"
              data-position="right"
              data-tooltip="Store"
              data-section="store-section"
            >
              <span class="link-icon icon-cart"></span>
              <span class="menu-link__heading">Store</span>
            </a>
          </li>
          <li class="left-menu__item">
            <a
              href="javascript:void(0);"
              class="menu-link nav-tooltipped"
              data-position="right"
              data-tooltip="Orders"
              data-section="orders-section"
            >
              <span class="link-icon icon-box"></span>
              <span class="menu-link__heading">Orders</span>
            </a>
          </li>
          <li class="left-menu__item">
            <a
              href="javascript:void(0);"
              class="menu-link nav-tooltipped"
              data-position="right"
              data-tooltip="My ESA Documents"
              data-section="esa-section"
            >
              <span class="link-icon icon-file"></span>
              <span class="menu-link__heading">My ESA Documents</span>
            </a>
          </li>
          <li class="left-menu__item">
            <a
              href="javascript:void(0);"
              class="menu-link nav-tooltipped"
              data-position="right"
              data-tooltip="New Landlord/Airline
                  Request"
              data-section="requests-section"
            >
              <span class="link-icon icon-edit"></span>
              <span class="menu-link__heading  border: 1px solid;"
                >New Landlord/Airline Request</span
              >
            </a>
          </li>
          <li class="left-menu__item">
            <a
              href="javascript:void(0);"
              class="menu-link nav-tooltipped"
              data-position="right"
              data-tooltip="Support"
              data-section="support-section"
            >
              <span class="link-icon icon-msg"></span>
              <span class="menu-link__heading">Support</span>
            </a>
          </li>
          <li class="left-menu__item">
            <a
              href="#"
              class="menu-link nav-tooltipped"
              data-position="right"
              data-tooltip="Sign Out"
            >
              <span class="link-icon icon-signout"></span>
              <span class="menu-link__heading">Sign Out</span>
            </a>
          </li>
        </ul>
      </header>

      <main class="main">
        <div class="container-fluid dashboard-wrapper">
          <!-- SIDEBAR TOGGLE -->
          <a href="#" class="openLeftMenu hide-on-med-and-down"></a>

          <!-- PROFILE SECTION -->
          <section id="profile-section" class="tab-section profile-section">
            <div class="profile-head valign-wrapper">
              <div class="row">
                <div class="col s12">
                  <h3 class="profile-head__welcome">
                    Welcome back
                    <span id="welcome-name">Andrew!</span>
                  </h3>
                </div>
              </div>
            </div>
            <!-- PROFILE MAIN FORM -->
            <form id="profile-form">
              <div class="row profile-photo m-top-3">
                <div class="col s12 m4">
                  <!-- CHOOSE PET'S PHOTO BLOCK -->
                  <div class="file-field input-field profile-photo__pic ">
                    <p class="pic-pre">Photo of Pet</p>

                    <div class="pic-edit">
                      <img
                        id="petPhoto"
                        class="hidden"
                        alt="your pet's photo"
                      />
                      <span class="edit-sign">
                        <input type="file" onchange="readURL(this);" />+
                      </span>
                    </div>
                  </div>
                </div>
                <div class="hide-on-small-only col  m8">
                  <div class="profile-picture center-align">
                    <img src="./img/dog_cat.png" alt="" />
                  </div>
                </div>
              </div>
              <!-- FIRST NAME / LAST NAME -->
              <div class="row">
                <div class="col s12 form-block">
                  <div class="row inputs-container">
                    <div class="input-field col s8 m2">
                      <select>
                        <option value="Mr." selected>Mr.</option>
                        <option value="Ms.">Ms.</option>
                      </select>
                      <label>Prefix</label>
                    </div>

                    <div class="input-field col s10 m4">
                      <input
                        id="firstname"
                        type="text"
                        class="validate input-outlined"
                        required
                      />
                      <label for="firstname">First Name</label>
                    </div>
                    <div class="input-field col s10 m4">
                      <input
                        id="lastname"
                        type="text"
                        class="validate"
                        required
                      />
                      <label for="lastname">Last Name</label>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tabs  -->
              <ul class="collapsible expandable">
                <!-- HANDLER INFO --> 
                <li class="form-block active">
                  <div class="collapsible-header">
                    <p class="form-block__heading">Handler Info</p>
                  </div>
                  <div class="collapsible-body">
                    <div class="row">
                      <div class="col s12">
                        <div class="row inputs-container">
                          <div class="input-field col s10 m7">
                            <input
                              id="email"
                              type="email"
                              class="validate"
                              required
                            />
                            <label for="email">Email</label>
                          </div>
                        </div>
                        <div class="row inputs-container">
                          <div class="input-field col s10 m7">
                            <input
                              type="text"
                              name="birthday"
                              id="birthday"
                              class="datepicker"
                              required
                            />
                            <label for="birthday">Date of Birth</label>
                          </div>
                        </div>
                        <div class="row inputs-container">
                          <div class="input-field col s10 m7">
                            <input
                              id="phoneNumber"
                              type="tel"
                              class="validate"
                              required
                            />
                            <label for="phoneNumber">Mobile Phone</label>
                          </div>
                        </div>
                        <div class="row inputs-container">
                          <div class="input-field col s10 m7">
                            <div class="gender-group">
                              <span class="gender-group__radio">
                                <label>
                                  <input
                                    class="with-gap"
                                    name="gender"
                                    type="radio"
                                    id="male"
                                    checked
                                    required
                                  />
                                  <span>Male</span>
                                </label>
                              </span>
                              <span class="gender-group__radio">
                                <label>
                                  <input
                                    class="with-gap"
                                    name="gender"
                                    type="radio"
                                    id="female"
                                    required
                                  />
                                  <span>Female</span>
                                </label>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- BILLING ADDRESS  -->
                <li class="form-block">
                  <div class="collapsible-header">
                    <p class="form-block__heading">Billing Address</p>
                  </div>
                  <div class="collapsible-body">
                    <div class="row">
                      <div class="col s12 ">
                        <div class="row inputs-container">
                          <div class="input-field col s10 m5 l7">
                            <input id="streetAddres1" type="text" required />
                            <label for="streetAddres1"
                              >Street Address 1</label
                            >
                          </div>
                        </div>
                        <div class="row inputs-container">
                          <div class="input-field col s10 m5 l7">
                            <input id="streetAddres2" type="text" required />
                            <label for="streetAddres2"
                              >Street Address 2</label
                            >
                          </div>
                        </div>
                        <div class="row inputs-container">
                          <div class="input-field col s10 m3 l3">
                            <input
                              id="city"
                              type="text"
                              class="validate"
                              required
                            />
                            <label for="city">City</label>
                          </div>
                          <div class="input-field col s10 m5 l2">
                            <select>
                              <option value="California" disabled selected
                                >California</option
                              >
                              <option value="Alabama">Alabama</option>
                              <option value="Arizona">Arizona</option>
                              <option value="Maine">Maine</option>
                              <option value="Nevada">Nevada</option>
                            </select>
                            <label>State</label>
                          </div>
                        </div>
                        <div class="row inputs-container">
                          <div class="input-field col s7 m3">
                            <input
                              id="zip"
                              type="text"
                              class="validate"
                              required
                            />
                            <label for="zip">Zip</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- SHIPPING ADDRESS  -->
                <li class="form-block">
                  <div class="collapsible-header">
                    <p class="form-block__heading">Shipping Address</p>
                  </div>
                  <div class="collapsible-body">
                    <div class="row">
                      <div class="col s12 ">
                        <div class="row inputs-container">
                          <div class="input-field col s10 m5 l7">
                            <input
                              id="ShippingStreetAddres1"
                              type="text"
                              required
                            />
                            <label for="ShippingStreetAddres1"
                              >Street Address 1</label
                            >
                          </div>
                        </div>
                        <div class="row inputs-container">
                          <div class="input-field col s10 m5 l7">
                            <input
                              id="ShippingStreetAddres2"
                              type="text"
                              required
                            />
                            <label for="ShippingStreetAddres2"
                              >Street Address 2</label
                            >
                          </div>
                        </div>
                        <div class="row inputs-container">
                          <div class="input-field col s10 m3 l3">
                            <input
                              id="shippingCity"
                              type="text"
                              class="validate"
                              required
                            />
                            <label for="shippingCity">City</label>
                          </div>
                          <div class="input-field col s10 m3 l2">
                            <select id="shippingState">
                              <option value="California" disabled selected
                                >California</option
                              >
                              <option value="Alabama">Alabama</option>
                              <option value="Arizona">Arizona</option>
                              <option value="Maine">Maine</option>
                              <option value="Nevada">Nevada</option>
                            </select>
                            <label>State</label>
                          </div>
                        </div>
                        <div class="row inputs-container">
                          <div class="input-field col s7 m3 l2">
                            <input
                              id="shippingZip"
                              type="text"
                              class="validate"
                              required
                            />
                            <label for="shippingZip">Zip</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>

                <!-- PASSWORD -->
                <li class="form-block">
                  <div class="collapsible-header">
                    <p class="form-block__heading">Password</p>
                  </div>
                  <div class="collapsible-body">
                    <div class="row">
                      <div class="col s12 ">
                        <div class="row inputs-container">
                          <div class="input-field col s10 m5">
                            <input
                              id="password"
                              type="password"
                              class="validate"
                              required
                            />
                            <label for="password">Password</label>
                          </div>
                        </div>
                        <div class="row inputs-container">
                          <div class="input-field col s10 m5">
                            <input
                              id="confirmPasword"
                              type="password"
                              class="validate"
                              required
                            />
                            <label for="pconfirmPasword"
                              >Confirm Password</label
                            >
                          </div>
                        </div>
                        <div
                          class="row inputs-container valign-wrapper"
                        ></div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>

              <div class="input-field col s6">
                <button
                  class="btn btn-large btn-register waves-effect waves-light profile-submit-btn"
                  type="submit"
                  name="action"
                >
                  Submit
                </button>
              </div>
            </form>
            <!-- END OF PROFILE FORM -->
          </section>
          <!-- END OF PROFILE SECTION -->
          <section id="refer-section" class="tab-section shop-section">
            <div class="row form-block">
              <div class="friendbuy-ekG-rGC"></div>
              <script>
                window['friendbuy'] = window['friendbuy'] || [];
                window['friendbuy'].push(['widget', 'ekG-rGC']);
              </script>
            </div>
          </section>
          <section id="pets-section" class="tab-section pets-section">
            <div class="carousel">
              <div class="carousel-item row"">
                <div class="col">
                  <div class="card">
                    <div class="card-image">
                      <img src="img/cat.jpg">
                      <span class="card-badge red"><i class="material-icons">warning</i> ESA isn't active</span>
                      <span class="card-title">Mrs. Waffle</span>
                    </div>
                    <div class="card-content">
                      <ul>
                        <li class="short">Mrs. Waffle</li>
                        <li class="breed">Manchkin</li>
                        <li class="weight">11.2 lbs</li>
                      </ul>
                    </div>
                    <div class="card-action">
                      <a href="#">Details</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item row"">
                <div class="col">
                  <div class="card">
                    <div class="card-image">
                      <img src="img/cat.jpg">
                      <span class="card-badge green"><i class="material-icons">done</i>ESA is active</span>
                      <span class="card-title">Mr. Maffin</span>
                    </div>
                    <div class="card-content">
                      <ul>
                        <li class="short">Mr. Maffin</li>
                        <li class="breed">Manchkin</li>
                        <li class="weight">9.6 lbs</li>
                      </ul>
                    </div>
                    <div class="card-action">
                      <a href="#">Details</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section id="store-section" class="tab-section shop-section">
            <div class="row shop-block">
              <div class="shop-section__container">
                <h3 class="shop-section__heading">Store</h3>
              </div>
            </div>

            <div class="row">
              <div class="col s12  m6 l4">
                <div class="card">
                  <div class="card-image">
                    <img
                      src="https://i.ontraport.com/183266.1c57908521b02820de39700f0925fb9a.JPEG"
                    />
                  </div>
                  <div class="card-content">
                    <p>
                      Take Your Pet Around Town with the "Official ESA™ Vest"
                    </p>
                  </div>
                  <div class="card-action">
                    <a
                      href="https://www.supportpets.com/vest-1-sale-existing-customers/"
                      class="esa-link"
                      target="_blank"
                    >
                      <span class="link-icon icon-palm"></span>
                      <span class="esa-link__text"
                        >Official
                        <span class="bold">ESA <sup>TM</sup> </span>
                        Vest</span
                      >
                      <span class="link-arrow"></span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col s12  m6 l4">
                <div class="card">
                  <div class="card-image">
                    <img
                      src="https://i.ontraport.com/183266.e88aab04082f0931a48c82bfe93a64b7.PNG?ops=1920"
                    />
                  </div>
                  <div class="card-content">
                    <p>
                      Take Your Pet Around Town With The "Official ESA ID
                      Card"
                    </p>
                  </div>
                  <div class="card-action">
                    <a
                      href="https://www.supportpets.com/clearance-sale-esa-id-cards-with-free-esa-tag/"
                      class="esa-link"
                      target="_blank"
                    >
                      <span class="link-icon icon-palm"></span>
                      <span class="esa-link__text"
                        >Official
                        <span class="bold">ESA <sup>TM</sup> </span> ID
                        Card</span
                      >
                      <span class="link-arrow"></span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col s12 m6 l4">
                <div class="card">
                  <div class="card-image">
                    <img
                      src="https://i.ontraport.com/183266.13ad02c0ada784e5ce1d3b03ef66d8e2.PNG?ops=640"
                    />
                  </div>
                  <div class="card-content">
                    <p>
                      Official Deluxe™ Renewal Kit
                    </p>
                  </div>
                  <div class="card-action">
                    <a
                      href="https://www.supportpets.com/esa-renewal-deluxe/"
                      class="esa-link"
                      target="_blank"
                    >
                      <span class="link-icon icon-palm"></span>
                      <span class="esa-link__text"
                        >Renew your
                        <span class="bold">ESA <sup>TM</sup> </span></span
                      >
                      <span class="link-arrow"></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </main>
    </div>

    <script src="js/min-jquery.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
