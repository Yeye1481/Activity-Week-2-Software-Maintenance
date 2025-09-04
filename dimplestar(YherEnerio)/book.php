<?php
include 'php_includes/connection.php';
include 'php_includes/book.php';
include 'header.php';   // contains <html><head> + opening <body><div id="wrapper">
include 'navbar.php';   // contains the logo + navbar
?>

<div id="content">
  <div id="gallerycontainer2">
    <div style="margin:0 auto; padding:30px 20px; max-width:1000px;">    

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="booking-form">
        <h1>BOOK NOW!</h1>

        <!-- Trip type -->
        <div class="form-row full">
          <label>
            <input type="radio" name="way" value="2" onclick="enableReturn(true)"> Two Way
          </label>
          <label style="margin-left:15px;">
            <input type="radio" name="way" value="1" onclick="enableReturn(false)" checked> One Way
          </label>
        </div>

        <!-- Origin -->
        <div class="form-row">
          <label>Origin</label>
          <select name="Origin" required>
            <option value="">Select</option>
            <option value="San Lazaro">San Lazaro</option>
            <option value="Espana">Espana</option>
            <option value="Alabang">Alabang</option>
            <option value="Cabuyao">Cabuyao</option>
            <option value="Naujan">Naujan</option>
            <option value="Victoria">Victoria</option>
            <option value="Pinamalayan">Pinamalayan</option>
            <option value="Gloria">Gloria</option>
            <option value="Bongabong">Bongabong</option>
            <option value="Roxas">Roxas</option>
            <option value="Mansalay">Mansalay</option>
            <option value="Bulalacao">Bulalacao</option>
            <option value="Magsaysay">Magsaysay</option>
            <option value="San Jose">San Jose</option>
            <option value="Pola">Pola</option>
            <option value="Soccoro">Soccoro</option>
          </select>
        </div>

        <!-- Destination -->
        <div class="form-row">
          <label>Destination</label>
          <select name="Destination" required>
            <option value="">Select</option>
            <option value="San Lazaro">San Lazaro</option>
            <option value="Espana">Espana</option>
            <option value="Alabang">Alabang</option>
            <option value="Cabuyao">Cabuyao</option>
            <option value="Naujan">Naujan</option>
            <option value="Victoria">Victoria</option>
            <option value="Pinamalayan">Pinamalayan</option>
            <option value="Gloria">Gloria</option>
            <option value="Bongabong">Bongabong</option>
            <option value="Roxas">Roxas</option>
            <option value="Mansalay">Mansalay</option>
            <option value="Bulalacao">Bulalacao</option>
            <option value="Magsaysay">Magsaysay</option>
            <option value="San Jose">San Jose</option>
            <option value="Pola">Pola</option>
            <option value="Soccoro">Soccoro</option>
          </select>
        </div>

        <!-- Passengers -->
        <div class="form-row">
          <label>No. of Passengers</label>
          <input type="number" name="Number" min="1" required>
        </div>

        <!-- Departure -->
        <div class="form-row">
          <label>Departure</label>
          <input id="datepick1" name="Departure" required>
        </div>

        <!-- Return -->
        <div class="form-row">
          <label>Return</label>
          <input id="datepick2" name="Return" disabled>
        </div>

        <!-- Bus Type -->
        <div class="form-row">
          <label>Bus Type</label>
          <select name="bustype" required>
            <option value="">Select</option>
            <option value="Air Conditioned">Air Conditioned</option>
            <option value="Ordinary">Ordinary</option>
          </select>
        </div>

        <!-- Submit -->
        <div class="form-row full">
          <button type="submit" name="submit" id="submit">Submit</button>
        </div>
      </form>

    </div>
  </div>
</div>

<style>
.booking-form {
  background: #fff;
  padding: 25px;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  margin-top: 20px;
  width: 100%;
}

.booking-form h1 {
  color: #006400; /* Dark Green */
  margin-bottom: 20px;
  text-align: center;
}

.booking-form {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.booking-form .form-row {
  display: flex;
  flex-direction: column;
}

.booking-form .form-row.full {
  grid-column: span 2;
}

.booking-form label {
  font-weight: bold;
  margin-bottom: 6px;
}

.booking-form select,
.booking-form input[type="text"],
.booking-form input[type="number"],
.booking-form input[name="Departure"],
.booking-form input[name="Return"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 6px;
  background: #fff;
  color: #333;
}

.booking-form input:focus,
.booking-form select:focus {
  border-color: #006400;
  outline: none;
  box-shadow: 0 0 4px rgba(0,100,0,0.3);
}

.booking-form button {
  background-color: #006400;
  color: #fff;
  padding: 12px;
  border: none;
  border-radius: 6px;
  font-size: 16px;
  cursor: pointer;
  transition: background 0.3s;
  width: 100%;
}

.booking-form button:hover {
  background-color: #004d00; /* Darker Green */
}

/* Fix calendar overlap */
.calendar {
  z-index: 9999 !important;
}

/* Mobile */
@media (max-width: 768px) {
  .booking-form {
    grid-template-columns: 1fr;
  }
}
</style>

<script type="text/javascript" src="js/datepickr.js"></script>
<script type="text/javascript">
  // datepickr calendars
  new datepickr('datepick1', { 'dateFormat': 'Y-m-d' });
  new datepickr('datepick2', { 'dateFormat': 'Y-m-d' });

  // Enable/disable return date properly
  function enableReturn(enable) {
    const returnInput = document.getElementById('datepick2');
    returnInput.disabled = !enable;
    if (!enable) {
      returnInput.value = "";
    }
  }
</script>
