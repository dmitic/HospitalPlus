import React from "react";

function Datum(props) {
    return <div className="wtt-cell bg-light">{new Intl.DateTimeFormat('sr-Latn', { 
        year: 'numeric', 
        month: 'long', 
        day: '2-digit'
      }).format(props.datum)}</div>;
}
export default Datum;