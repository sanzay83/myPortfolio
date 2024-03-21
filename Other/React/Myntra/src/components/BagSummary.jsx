import React from "react";

function BagSummary() {
  const bagSummary = {
    totalItem: 3,
    totalMRP: 234,
    totalDiscount: 33,
    finalPayment: 1212,
  };
  return (
    <div>
      <div class="bag-details-container">
        <div class="price-header">
          PRICE DETAILS ({bagSummary.totalItem} Items){" "}
        </div>
        <div class="price-item">
          <span class="price-item-tag">Total MRP</span>
          <span class="price-item-value">₹{bagSummary.totalMRP}</span>
        </div>
        <div class="price-item">
          <span class="price-item-tag">Discount on MRP</span>
          <span class="price-item-value priceDetail-base-discount">
            -₹{bagSummary.totalDiscount}
          </span>
        </div>
        <div class="price-item">
          <span class="price-item-tag">Convenience Fee</span>
          <span class="price-item-value">₹99</span>
        </div>
        <hr />
        <div class="price-footer">
          <span class="price-item-tag">Total Amount</span>
          <span class="price-item-value">₹{bagSummary.finalPayment}</span>
        </div>
      </div>
      <button class="btn-place-order">
        <div class="css-xjhrni">PLACE ORDER</div>
      </button>
    </div>
  );
}

export default BagSummary;
