import React from 'react';

import { ClipLoader } from "react-spinners";


export default function Loading() {
    return (
        <div className="BeatLoader">
            <ClipLoader
                size={30}
                color={"#123abc"}
            />
        </div>
    );
}
