package cm;
import java.math.BigDecimal;
import java.math.RoundingMode;

public interface CalculateRate {
	BigDecimal calculate(BigDecimal Rate);
}

class VisitorCharges implements CalculateRate {
	private BigDecimal visitorRateNoCharge = BigDecimal.valueOf(8);
	// 50% discount on amount above 8
	private BigDecimal visitorRate = BigDecimal.valueOf(0.5);

	@Override
	public BigDecimal calculate(BigDecimal Rate) {
		Rate = (visitorRate.multiply(Rate.subtract(visitorRateNoCharge)));
		return (Rate.compareTo(BigDecimal.ZERO) > 0) ? Rate.setScale(2, RoundingMode.CEILING) : BigDecimal.ZERO;
	}
}

class StudentCharges implements CalculateRate {
	// First 5.00 not eligible for discount
	private BigDecimal studentBaseLine = BigDecimal.valueOf(5);
	// 25% discount on subsequent amount
	private BigDecimal studentRate = BigDecimal.valueOf(0.25);

	@Override
	public BigDecimal calculate(BigDecimal Rate) {
		if (Rate.compareTo(studentBaseLine) > 0) {
			Rate = studentBaseLine.add(((Rate).subtract(studentBaseLine))
					.subtract(((Rate).subtract(studentBaseLine)).multiply(studentRate)));
		}
		return (Rate.compareTo(BigDecimal.ZERO) > 0) ? Rate.setScale(2, RoundingMode.CEILING) : BigDecimal.ZERO;
	}
}

class StaffCharges implements CalculateRate {
	private BigDecimal staffRateMaxCharge = BigDecimal.valueOf(16);

	@Override
	public BigDecimal calculate(BigDecimal Rate) {
		return (Rate.compareTo(staffRateMaxCharge) <= 0) ? Rate.setScale(2, RoundingMode.CEILING) : staffRateMaxCharge;
	}
}

class ManagementCharges implements CalculateRate {

	@Override
	public BigDecimal calculate(BigDecimal Rate) {
		return Rate.setScale(3, RoundingMode.CEILING);
	}
}