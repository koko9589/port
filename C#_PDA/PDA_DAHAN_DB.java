  

public boolean getStockData(StockBean sbean) {
		boolean result = false;
		
		String sql = " SELECT A.PACK_NO, " +
				 " A.COIL_NO, " +
				 " A.COIL_SEQ, " +
				 " B.COIL_NM AS NAME_NM, " +
				 " C.STAN_NM, " +
				 " A.SIZE_NO, " +
				 " A.QUANTITY, " +
				 " A.WEIGHT, " +
				 " NVL(A.POS_CD2, A.POS_CD1) AS POS_CD1, " +
				 " E.CODE_NAME AS MILL_MAKER_NM, " +
				 " COUNT(A.LABEL_NO) OVER (PARTITION BY A.LABEL_NO ORDER BY A.LABEL_NO) AS CNT " +
				 " FROM STOCK_NOW A LEFT OUTER JOIN CODE_NM B ON A.NAME_CD = B.NAME_CD " +
				 " LEFT OUTER JOIN CODE_STAN C ON A.STAN_CD = C.STAN_CD " +
				 " LEFT OUTER JOIN COIL D ON A.COIL_NO = D.COIL_NO AND D.COIL_SEQ = '01' " +
				 " LEFT OUTER JOIN CODE_COMMON E ON D.MILL_MAKER_CD = E.CODE_CD AND E.CODE_KIND = 'CM006' " +
				 " WHERE A.STOCK_DATE = '" + sbean.getStock_date() + "' " +
				 " AND TRIM(A.LABEL_NO) = TRIM('" + sbean.getLabel_no() + "') ";
		
		System.out.println("sql : " + sql);
		
		try {
			stmt=con.createStatement();
			rs = stmt.executeQuery(sql);
			
			if(rs.next()) {
				result = true;
				sbean.setPack_no(rs.getString("PACK_NO"));
				sbean.setCoil_no(rs.getString("COIL_NO"));
				sbean.setCoil_seq(rs.getString("COIL_SEQ"));
				sbean.setName_nm(rs.getString("NAME_NM"));
				sbean.setStan_nm(rs.getString("STAN_NM"));
				sbean.setSize_no(rs.getString("SIZE_NO"));
				sbean.setQuantity(rs.getInt("QUANTITY"));
				sbean.setWeight(rs.getFloat("WEIGHT"));
				sbean.setPos_cd1(rs.getString("POS_CD1"));
				sbean.setMill_maker_nm(rs.getString("MILL_MAKER_NM"));
				sbean.setCount(rs.getInt("CNT"));
			}
		} catch(Exception ex) {
			System.out.println("getStockData() ERROR: " + ex);			
		}
			
		return result;		
	}
	
	public boolean updateStockNow(StockBean sbean) {
		boolean result = false;
		
		String sql = " UPDATE STOCK_NOW " +
				 " SET POS_CD2 = '" + sbean.getPos_cd() + "', " +
				 " SCAN_DATE = '" + sbean.getStock_date() + "', " +
				 " UPDATE_ID = '" + sbean.getLogin_id() + "', " +
				 " UPDATE_PROGRAM = 'PDA', " +
				 " UPDATE_DATETIME = '" + ls_today + "', " +
				 " UPDATE_COMPUTER = 'PDA', " +
				 " READ_DATETIME = '" + ls_today + "' " +
				 " WHERE STOCK_DATE = '" + sbean.getStock_date() + "' " +
				 " AND TRIM(LABEL_NO) = TRIM('" + sbean.getLabel_no() + "') " +
	                         " AND YARD_CUST_CD= '" + sbean.getyard_cust_cd() + "'";

		
		System.out.println("sql : " + sql);
		
		try {
			stmt = con.createStatement();
			int rt = stmt.executeUpdate(sql);
			
			result = rt > 0;
		} catch (Exception ex) {
			System.out.println("updateStockNow() ERROR: " + ex);		
		}
		
		return result;
	}
	
	public boolean insertStockNow(StockBean sbean) {
		boolean result = false;
		
		String sql = " INSERT INTO STOCK_NOW " +
				 " ( STOCK_DATE, WORK_CUST_CD, STOCK_CLS, STOCK_NO, " +
				 " STOCK_SEQ, LABEL_NO, QUANTITY, WEIGHT, SCAN_DATE, POS_CD2, " +
				 " YARD_CUST_CD, INSERT_ID, INSERT_DATETIME, INSERT_PROGRAM, " +
				 " UPDATE_ID, UPDATE_DATETIME, UPDATE_PROGRAM, UPDATE_COMPUTER, READ_DATETIME ) " +
				 " VALUES ( '" + sbean.getStock_date() + "', '" + sbean.getNow_work_cust_cd() + "', 'I', TRIM('" + sbean.getLabel_no() + "')," +
				 " '001', '" + sbean.getLabel_no() + "', 0, 0, '" + sbean.getStock_date() + "', '', " +
				 " '" + sbean.getWorkplace_cd() + "', '" + sbean.getLogin_id() + "', '" + ls_today + "', 'PDA', " +
				 " '" + sbean.getLogin_id() + "', '" + ls_today + "', 'PDA', 'PDA', '" + ls_today + "' )";
		
		System.out.println("sql : " + sql);
		
		try {
			stmt = con.createStatement();
			int rt = stmt.executeUpdate(sql);
			sbean.setQuantity(0);
			sbean.setWeight(0);
			
			result = rt > 0;
		} catch (Exception ex) {
			System.out.println("insertStockNow() ERROR: " + ex);		
		}
		
		return result;
	}
	
	public String getSysdate(int format) {
		String sysdate = null;
		
		String sql = "SELECT TO_CHAR(SYSDATE, 'yyyyMMddHH24miSS') AS SYS_DATE " +
					 " FROM DUAL ";

		try {
			stmt=con.createStatement();
			rs = stmt.executeQuery(sql);
			
			if(rs.next()) {
				sysdate = rs.getString("SYS_DATE");
			}
		} catch(Exception ex) {
			System.out.println("getSysdate() ERROR: " + ex);			
		}
		
		if(format == 1) {
			SimpleDateFormat sf = new SimpleDateFormat("yyyyMMddHHmmss");
			SimpleDateFormat transFormat = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss"); 

			Date date;
			try {
				date = sf.parse(sysdate);
				
				sysdate = transFormat.format(date);
				sysdate = sysdate.substring(0, 10);
			} catch (ParseException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
		
		return sysdate;
	}
	
	public void rollback() {
		try {
			con.rollback();
		} catch (Exception e) {
			// TODO: handle exception
			e.getStackTrace();
		}	
	}
	
	public void commit() {
		try {
			con.commit();
		} catch (Exception e) {
			// TODO: handle exception
			e.getStackTrace();
		}	
	}
		
	public void close() {
		try {
			if (rs != null) try { rs.close(); } catch(SQLException ex) {}
			if (stmt != null) try { stmt.close(); } catch(SQLException ex) {}
			if (con != null) try { con.close(); } catch(SQLException ex) {}
		} catch (Exception e) {
			// TODO: handle exception
			e.getStackTrace();
		}
	}
}