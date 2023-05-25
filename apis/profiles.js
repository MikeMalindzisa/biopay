const { json } = require('body-parser');
const express = require('express');
const router = express.Router();
const dbConnection = require('./dbConnection');


//Register User account
router.post('/register', (req, res) => {
    const fname = req.body.fname; // Retrieve user profile from the request body
    const lname = req.body.lname;
    const dob = req.body.dob;
    const age = req.body.age;
    const email = req.body.email;
    const phone = req.body.phone;
    const nationalID = req.body.nationalID;

    // Rest of the code to handle the registration logic

    // Check if user exists using email
    dbConnection.query(`SELECT users.email FROM users WHERE users.email = '${email}'`, (err, result) => {
        if (err) {
            console.error(err);
            res.status(500).send('Error retrieving user balance');
        } else if (result.length > 0) {
            res.status(404).send(`A User with the same email: ${userId} already exists!`);
        } else {
            // Create user profile
            dbConnection.query(`INSERT INTO users (fname, lname, email, phone, dob, age) VALUES ('${fname}', '${lname}', '${email}', '${phone}', '${dob}', ${age})`, (err, result) => {
                if (err) {
                    console.error(err);
                    res.status(500).send('Error creating user account.');
                }
                else {
                    res.json({
                        msg: 'User account created successfully.',
                        accountHolder: fname + ' ' + lname
                    });
                    console.log(result);
                }
            });
        }
    });
});