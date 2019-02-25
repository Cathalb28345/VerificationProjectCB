//package verificationProject.Tests;
///*
// Student name : Cathal Brady
// Student number : c00202493 
// due date : 18/02/19*/
//
//import org.junit.Before;
//import org.junit.Test;
//
//import verificationProject.CarParkKind;
//import verificationProject.Period;
//import verificationProject.Rate;
//
//import java.math.BigDecimal;
//import java.util.ArrayList;
//
//public class BradyCathalTask1 {
//
//	ArrayList<Period> reducedPeriods;
//	ArrayList<Period> normalPeriods;
//	BigDecimal BigDecimal;
//
//	@Before
//	public void SetPeriodArraysForCheck() {
//		reducedPeriods = new ArrayList<>();
//		reducedPeriods.add(new Period(6, 7));
//		normalPeriods = new ArrayList<>();
//		normalPeriods.add(new Period(2, 5));
//		normalPeriods.add(new Period(17, 20));
//
//		BigDecimal = null;
//	}
//
//	/*
//	 * TEST 1: Kind is valid.
//	 */
//	@org.junit.Test
//	public void kindIsValidCheck() {
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		ArrayList<Period> reducedPeriods = new ArrayList<>();
//
//		Rate rateDue = new Rate(CarParkKind.VISITOR, BigDecimal.valueOf(5), BigDecimal.valueOf(2), reducedPeriods,
//				normalPeriods);
//	}
//
//	/*
//	 * TEST 2: Kind is invalid.
//	 */
//	@Test (expected = IllegalArgumentException.class)
//	    public void kindIsNullCheck() {
//	        ArrayList<Period> normalPeriods = new ArrayList<>();
//	        normalPeriods.add(new Period(1, 3));
//	        ArrayList<Period> reducedPeriods = new ArrayList<>();
//	        reducedPeriods.add(new Period(4, 6));
//	        Rate rateDue = new Rate(null, new BigDecimal(2), new BigDecimal(1), reducedPeriods, normalPeriods);
//	    }
//
//	/*
//	 * TEST 3: normal rate < 0
//	 */
//	@org.junit.Test(expected = IllegalArgumentException.class)
//	public void normalRateLessThanZeroCheck() {
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		normalPeriods.add(new Period(1, 3));
//		ArrayList<Period> reducedPeriods = new ArrayList<>();
//		reducedPeriods.add(new Period(4, 6));
//
//		Rate rateDue = new Rate(CarParkKind.MANAGEMENT, BigDecimal.valueOf(0), BigDecimal.valueOf(-1), reducedPeriods,
//				normalPeriods);
//	}
//
//	/*
//	 * TEST 4: normal rate > 0
//	 */
//	@org.junit.Test
//	public void normalRateGreaterThanZeroCheck() {
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		normalPeriods.add(new Period(1, 3));
//		ArrayList<Period> reducedPeriods = new ArrayList<>();
//		reducedPeriods.add(new Period(4, 6));
//
//		Rate rateDue = new Rate(CarParkKind.MANAGEMENT, BigDecimal.valueOf(2.5), BigDecimal.valueOf(1), reducedPeriods,
//				normalPeriods);
//	}
//
//	/*
//	 * TEST 5: normalRate == 1
//	 */
//	@org.junit.Test(expected = IllegalArgumentException.class)
//	public void normalRateEqualsOneCheck() throws Exception {
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		normalPeriods.add(new Period(1, 1));
//		ArrayList<Period> reducedPeriods = new ArrayList<>();
//		reducedPeriods.add(new Period(4, 6));
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(1), BigDecimal.valueOf(1), reducedPeriods,
//				normalPeriods);
//	} // Throws exception as Reduced !< normal.
//
//	/*
//	 * TEST 6 : normalRate == 0
//	 */
//	@org.junit.Test(expected = IllegalArgumentException.class)
//	public void normalRateEqualZeroCheck() throws Exception {
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		normalPeriods.add(new Period(0, 0));
//		ArrayList<Period> reducedPeriods = new ArrayList<>();
//		reducedPeriods.add(new Period(4, 6));
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(0), BigDecimal.valueOf(0), reducedPeriods,
//				normalPeriods);
//	}
//
//	/*
//	 * TEST 7: normalRate == maximum integer
//	 */
//	@org.junit.Test
//	public void normalRateMaximuimInteger() {
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(Integer.MAX_VALUE), BigDecimal.valueOf(42),
//				reducedPeriods, normalPeriods);
//	}
//
//	/*
//	 * TEST 8: normalRate > reducedRate
//	 */
//	@org.junit.Test
//	public void normalRateGreaterThanReducedRate() {
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		normalPeriods.add(new Period(7, 9));
//		ArrayList<Period> reducedPeriods = new ArrayList<>();
//		reducedPeriods.add(new Period(4, 6));
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(7), BigDecimal.valueOf(8), reducedPeriods,
//				normalPeriods);
//	}
//
//	/*
//	 * TEST 9: normalRate, reducedRate invalid argument
//	 */
//	@org.junit.Test(expected = IllegalArgumentException.class)
//	public void normalRateInvalidArgumentEntryCheck() throws Exception {
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		normalPeriods.add(new Period(0, 0));
//		ArrayList<Period> reducedPeriods = new ArrayList<>();
//		reducedPeriods.add(new Period(4, 6));
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf('A'), BigDecimal.valueOf('T'), reducedPeriods,
//				normalPeriods);
//	}
//
//	/*
//	 * TEST 10: reducedRate > normalRate
//	 */
//	@org.junit.Test(expected = IllegalArgumentException.class)
//	public void ReducedRateGreaterThanNormalRateCheck() throws Exception {
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		ArrayList<Period> reducedPeriods = new ArrayList<>();
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(1), BigDecimal.valueOf(2), reducedPeriods,
//				normalPeriods);
//	}
//
//	/*
//	 * TEST 11: normalRate < reducedRate
//	 */
//	@org.junit.Test(expected = IllegalArgumentException.class)
//	public void normalRateLessThanReducedRateCheck() throws Exception {
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		ArrayList<Period> reducedPeriods = new ArrayList<>();
//
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(5), BigDecimal.valueOf(7), reducedPeriods,
//				normalPeriods);
//	}
//
//	/*
//	 * TEST 12: reducedRate < 0
//	 */
//	@org.junit.Test(expected = IllegalArgumentException.class)
//	public void ReducedRateLessThanZeroIntegerCheck() throws Exception {
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		normalPeriods.add(new Period(0, 0));
//		ArrayList<Period> reducedPeriods = new ArrayList<>();
//		reducedPeriods.add(new Period(4, 6));
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(5), BigDecimal.valueOf(-1), reducedPeriods,
//				normalPeriods);
//	}
//
//	/*
//	 * TEST 13: reducedRate == 0
//	 */
//	@org.junit.Test(expected = IllegalArgumentException.class)
//	public void ReducedRateEqualZeroCheck() throws Exception {
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		normalPeriods.add(new Period(0, 0));
//		ArrayList<Period> reducedPeriods = new ArrayList<>();
//		reducedPeriods.add(new Period(4, 6));
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(0), BigDecimal.valueOf(0), reducedPeriods,
//				normalPeriods);
//	}
//
//	/*
//	 * TEST 14: reducedRate == normalRate
//	 */
//	@org.junit.Test(expected = IllegalArgumentException.class)
//	public void ReducedRateIsEqualToNormalRate() throws Exception {
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		ArrayList<Period> reducedPeriods = new ArrayList<>();
//
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(4), BigDecimal.valueOf(4), reducedPeriods,
//				normalPeriods);
//	}
//
//	/*
//	 * TEST 15: ReducedPeriod within bounds
//	 */
//	@org.junit.Test
//	public void ReducedPeriodIsValidPeriodCheck() {
//		ArrayList<Period> reducedPeriods = new ArrayList<Period>() {
//			{
//				add(new Period(11, 17));
//			}
//		};
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(12), BigDecimal.valueOf(2), reducedPeriods,
//				normalPeriods);
//	}
//
//	/*
//	 * TEST 16: reducedPeriods max number periods
//	 */
//	@org.junit.Test
//	public void ReducedPeriodsIsMaximumNumberOfPeriods() {
//		ArrayList<Period> reducedPeriods = new ArrayList<Period>() {
//			{
//				for (int i = 0; i < 24; i++) {
//					add(new Period(i, i + 1));
//				}
//			}
//		};
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(3), BigDecimal.valueOf(2), reducedPeriods,
//				normalPeriods);
//	}
//
//	/*
//	 * TEST 18: normalRate is null
//	 */
//	@org.junit.Test(expected = IllegalArgumentException.class)
//	public void normalRateIsNullCheck() throws Exception {
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		ArrayList<Period> reducedPeriods = new ArrayList<>();
//
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal, BigDecimal.valueOf(2), reducedPeriods, normalPeriods);
//	}
//
//	/*
//	 * TEST 19: reducedRate is null
//	 */
//	@org.junit.Test(expected = IllegalArgumentException.class)
//	public void ReducedRateIsNullCheck() throws Exception {
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		ArrayList<Period> reducedPeriods = new ArrayList<>();
//
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(3), BigDecimal, reducedPeriods, normalPeriods);
//	}
//
//	/*
//	 * TEST 20: normalRate and reducedRate is null
//	 */
//	@org.junit.Test(expected = IllegalArgumentException.class)
//	public void AllRatesAreNullCheck() throws Exception {
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal, BigDecimal, reducedPeriods, normalPeriods);
//	}
//
//	/*
//	 * TEST 21: ReducedPeriod overlap with normalPeriod
//	 */
//	@org.junit.Test(expected = IllegalArgumentException.class)
//	public void ReducedPeriodOverlapWithNormalPeriod() throws Exception {
//		ArrayList<Period> reducedPeriods = new ArrayList<Period>() {
//			{
//				add(new Period(1, 8));
//			}
//		};
//		ArrayList<Period> normalPeriods = new ArrayList<Period>() {
//			{
//				add(new Period(7, 11));
//			}
//		};
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(3), BigDecimal.valueOf(2), reducedPeriods,
//				normalPeriods);
//	}
//
//	/*
//	 * TEST 22: reducedPeriods too many periods
//	 */
//	@org.junit.Test(expected = IllegalArgumentException.class)
//	public void ReducedPeriodsContainsTooManyPeriodsBoundaryPush() throws Exception {
//		ArrayList<Period> reducedPeriods = new ArrayList<Period>() {
//			{
//				for (int i = 0; i < 25; i++) { // loop till outside then add
//					add(new Period(i, i + 1));
//				}
//			}
//		};
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(4), BigDecimal.valueOf(3), reducedPeriods,
//				normalPeriods);
//	}
//
//	/*
//	 * TEST 23: normalPeriod within bounds
//	 */
//	@org.junit.Test
//	public void normalPeriodIsValidCheck() {
//		ArrayList<Period> normalPeriods = new ArrayList<Period>() {
//			{
//				add(new Period(11, 17));
//			}
//		};
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(4), BigDecimal.valueOf(12), reducedPeriods,
//				normalPeriods);
//	}
//
//	/*
//	 * TEST 24: normalPeriods max number periods
//	 */
//	@org.junit.Test
//	public void normalPeriodsHasMaximumPeriodAmount() {
//		ArrayList<Period> reducedPeriods = new ArrayList<>();
//		ArrayList<Period> normalPeriods = new ArrayList<Period>() {
//			{
//				for (int i = 0; i < 24; i++) {
//					add(new Period(i, i + 1));
//				}
//			}
//		};
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(4), BigDecimal.valueOf(24), reducedPeriods,
//				normalPeriods);
//	}
//
//	/*
//	 * TEST 25: set reducedRate to the Integer.MAX_VALUE == Integer.MIN
//	 * https://stackoverflow.com/questions/9397475/why-integer-max-value-1-integer-
//	 * min-value
//	 */
//	@org.junit.Test
//	public void ReducedRateMaximumIntegerPlusOne() {
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(Integer.MAX_VALUE),
//				BigDecimal.valueOf(Integer.MIN_VALUE), reducedPeriods, normalPeriods);
//	}
//
//	/*
//	 * TEST 26: reducedRate == maxInt - 1
//	 * https://stackoverflow.com/questions/30685641/explanation-on-integer-max-value
//	 * -and-integer-min-value-to-find-min-and-max-value // where i found the
//	 * MAX_VAlUE tag
//	 */
//	@org.junit.Test
//	public void ReducedRateCheckAgainstMaximumIntegerMinusOne() {
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		ArrayList<Period> reducedPeriods = new ArrayList<>();
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(Integer.MAX_VALUE),
//				BigDecimal.valueOf(Integer.MAX_VALUE - 1), reducedPeriods, normalPeriods);
//	}
//
//	/*
//	 * TEST 27: ReducedPeriod overlap
//	 */
//	@org.junit.Test(expected = IllegalArgumentException.class)
//	public void ReducedPeriodsOverlapWithPeriod() throws Exception {
//		ArrayList<Period> reducedPeriods = new ArrayList<Period>() {
//			{
//				add(new Period(6, 7));
//				add(new Period(6, 8));
//			}
//		};
//		ArrayList<Period> normalPeriods = new ArrayList<>();
//		normalPeriods.add(new Period(0, 0));
//		Rate rateDue = new Rate(CarParkKind.STUDENT, BigDecimal.valueOf(3), BigDecimal.valueOf(2), reducedPeriods,
//				normalPeriods);
//	}
//
//}