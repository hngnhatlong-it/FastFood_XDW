const express = require("express")
const cors = require("cors")

const app = express()

app.use(cors())
app.use(express.json())

app.post("/create-payment",(req,res)=>{

    let amount = req.body.amount
    let orderId = req.body.orderId

    let qr =
    "https://img.vietqr.io/image/VCB-1027068519-compact.png?amount="
    + amount +
    "&addInfo=" + orderId

    res.json({
        qrCode: qr
    })

})

app.listen(3000,()=>{
    console.log("Server running at http://localhost:3000")
})