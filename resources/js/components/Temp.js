import React from "react";

function Temp(props) {
    return (
        <div className="wtt-cell bg-light">
            <div>{props.temperatura}</div>
            <img src={props.src}></img>
        </div>
    )
}
export default Temp
