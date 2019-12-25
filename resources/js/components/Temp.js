import React from "react";

function Temp(props) {
    return (
        <div className="temperatura d-flex align-items-center">
            <div>{props.temperatura}&#176;C</div>
            <img src={props.src}></img>
        </div>
    )
}
export default Temp
