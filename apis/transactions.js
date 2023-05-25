const { json } = require('body-parser');
const express = require('express');
const router = express.Router();
const dbConnection = require('./dbConnection');

// Endpoint to check user balance
router.get('/balance/:id', function (req, res) {
    const userId = req.params.id;
    const sql = 'SELECT balance, fname, lname FROM wallets INNER JOIN users ON wallets.user_id = users.id WHERE user_id = ?';

    dbConnection.query(sql, userId, function (err, result) {
        if (err) {
            console.error(err);
            res.status(500).json({ error: 'Error retrieving balance' });
        } else if (result.length === 0) {
            res.status(404).json({ error: `User not found for the ID: ${userId}` });
        } else {
            const balance = result[0].balance;
            const fname = result[0].fname;
            const lname = result[0].lname;
            res.json({ fname: fname, lname: lname, balance: balance });
        }
    });
});

router.post('/recharge', (req, res) => {
    const userId = req.body.user_id;
    const amount = req.body.amount;

    // Check if user exists
    const query = `SELECT wallets.balance, users.fname, users.lname
                   FROM wallets
                   INNER JOIN users ON wallets.user_id = users.id
                   WHERE wallets.user_id = ${userId}`;

    dbConnection.query(query, (err, result) => {
        if (err) {
            console.error(err);
            res.status(500).send('Error recharging wallet');
        } else if (result.length === 0) {
            res.status(404).send(`User not found for the ID: ${userId}`);
        } else {
            // Retrieve account holder's name
            const accountHolder = result[0].fname + ' ' + result[0].lname;

            // Update user's wallet balance
            const currentBalance = parseFloat(result[0].balance);
            const newBalance = currentBalance + parseFloat(amount);

            dbConnection.query(`UPDATE wallets SET balance = ${newBalance} WHERE user_id = ${userId}`, (err, result) => {
                if (err) {
                    console.error(err);
                    res.status(500).send('Error recharging wallet');
                } else {
                    res.json({
                        msg: 'Wallet recharged successfully.',
                        accountHolder: accountHolder,
                        amount: amount,
                        prevBal: currentBalance.toFixed(2),
                        newBal: newBalance.toFixed(2)
                    });
                }
            });
        }
    });
});

router.post('/withdrawal', (req, res) => {
    const userId = req.body.user_id; // Retrieve the user_id from the request body
    const amount = req.body.amount;

    // Rest of the code to handle the withdrawal logic

    // Modify the query to use the correct column names
    dbConnection.query(`SELECT wallets.balance, users.fname, users.lname FROM wallets
        INNER JOIN users ON wallets.user_id = users.id
        WHERE wallets.user_id = ${userId}`, (err, result) => {
        if (err) {
            console.error(err);
            res.status(500).send('Error retrieving user balance');
        } else if (result.length === 0) {
            res.status(404).send(`User not found for the ID: ${userId}`);
        } else {
            const balance = result[0].balance;
            const fname = result[0].fname;
            const lname = result[0].lname;

            // Calculate new balance after withdrawal
            const newBalance = balance - parseFloat(amount);

            // Update user's wallet balance
            dbConnection.query(`UPDATE wallets SET balance = ${newBalance} WHERE user_id = ${userId}`, (err, result) => {
                if (err) {
                    console.error(err);
                    res.status(500).send('Error withdrawing from wallet');
                }
                else {
                    res.json({
                        msg: 'Withdrawal successful',
                        withdrawnAmount: amount,
                        accountHolder: fname + ' ' + lname,
                        balance: newBalance
                    });
                }
            });
        }
    });
});











module.exports = router;
