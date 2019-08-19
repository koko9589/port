
sql :  SELECT A.PACK_NO,  A.COIL_NO,  A.COIL_SEQ,  B.COIL_NM AS NAME_NM,  C.STAN_NM,  A.SIZE_NO,  A.QUANTITY,  A.WEIGHT,  NVL(A.POS_CD2, A.POS_CD1) AS POS_CD1,  E.CODE_NAME AS MILL_MAKER_NM,  COUNT(A.LABEL_NO) OVER (PARTITION BY A.LABEL_NO ORDER BY A.LABEL_NO) AS CNT  
FROM STOCK_NOW A LEFT OUTER JOIN CODE_NM B ON A.NAME_CD = B.NAME_CD  LEFT OUTER JOIN CODE_STAN C ON A.STAN_CD = C.STAN_CD  LEFT OUTER JOIN COIL D ON A.COIL_NO = D.COIL_NO AND D.COIL_SEQ = '01'  LEFT OUTER JOIN CODE_COMMON E ON D.MILL_MAKER_CD = E.CODE_CD AND E.CODE_KIND = 'CM006'  WHERE A.STOCK_DATE = '20180604'  AND TRIM(A.LABEL_NO) = TRIM('L1B710270004') 



sql :  INSERT INTO STOCK_NOW  ( STOCK_DATE, WORK_CUST_CD, STOCK_CLS, STOCK_NO,  STOCK_SEQ, LABEL_NO, QUANTITY, WEIGHT, SCAN_DATE, POS_CD2,  YARD_CUST_CD, INSERT_ID, INSERT_DATETIME, INSERT_PROGRAM,  UPDATE_ID, UPDATE_DATETIME, UPDATE_PROGRAM, UPDATE_COMPUTER, READ_DATETIME )  
VALUES ( '20180604', '00000', 'I', TRIM('L1B710270004'), '001', 'L1B710270004', 0, 0, '20180604', '',  'AA001', 'DH14040101', '20180604101950', 'PDA',  'DH14040101', '20180604101950', 'PDA', 'PDA', '20180604101950' )
dhsteel



sql :  SELECT A.PACK_NO,  A.COIL_NO,  A.COIL_SEQ,  B.COIL_NM AS NAME_NM,  C.STAN_NM,  A.SIZE_NO,  A.QUANTITY,  A.WEIGHT,  NVL(A.POS_CD2, A.POS_CD1) AS POS_CD1,  E.CODE_NAME AS MILL_MAKER_NM,  COUNT(A.LABEL_NO) OVER (PARTITION BY A.LABEL_NO ORDER BY A.LABEL_NO) AS CNT  
FROM STOCK_NOW A LEFT OUTER JOIN CODE_NM B ON A.NAME_CD = B.NAME_CD  LEFT OUTER JOIN CODE_STAN C ON A.STAN_CD = C.STAN_CD  LEFT OUTER JOIN COIL D ON A.COIL_NO = D.COIL_NO AND D.COIL_SEQ = '01'  LEFT OUTER JOIN CODE_COMMON E ON D.MILL_MAKER_CD = E.CODE_CD AND E.CODE_KIND = 'CM006'  WHERE A.STOCK_DATE = '20180604'  AND TRIM(A.LABEL_NO) = TRIM('L1B710270004') 


sql :  UPDATE STOCK_NOW  SET POS_CD2 = '',  SCAN_DATE = '20180604',  UPDATE_ID = 'DH14040101',  UPDATE_PROGRAM = 'PDA',  UPDATE_DATETIME = '20180604102031',  UPDATE_COMPUTER = 'PDA',  READ_DATETIME = '20180604102031'  WHERE STOCK_DATE = '20180604'  AND TRIM(LABEL_NO) = TRIM('L1B710270004')  AND YARD_CUST_CD= 'null'


	System.out.println("getyard_cust() ERROR: " + ex);	

 private void new
 if ()
 {
     MessageBox.Show("신규입니다.");
     return;  
}
    


System.out.println("updateStockNow() ERROR: " + ex);

	" AND YARD_CUST_NM = '";


" AND YARD_CUST_CD='AA001'";


package com.micromos.dao;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;

import javax.naming.NamingException;

import com.micromos.bean.ShipBean;
import com.micromos.db.DBConnection;

public class ShipDAO {

	private Connection con = null;
	private Statement stmt = null;
	private ResultSet rs = null;
	String ls_today = null;
	
	public ShipDAO(int db_status) {
		try {
			
			if(db_status == 1) {
				con = DBConnection.getConnection();
			} else {
				con = DBConnection.getConnectionOK();
			}
			
			con.setAutoCommit(false);
			
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (NamingException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		ls_today = getSysdate(2);
	}
	
	public boolean getShipNo(String ship_no) {
		boolean result = false;
		
		String sql = "SELECT A.SHIP_NO " + 
				 " FROM SHIP_MASTER A" +
				 " WHERE A.REFERENCE_NO = '" + ship_no + "' ";
		
		System.out.println("sql : " + sql);
		
		try {
			stmt=con.createStatement();
			rs = stmt.executeQuery(sql);
			
			if (rs.next()) {
				result = true;
			}
		} catch(Exception ex) {
			System.out.println("getRequestNo() ERROR: " + ex);			
		} 
		
		return result;
	}
	
	public ArrayList<ShipBean> getShipDetail(String ship_no) {
		
		String sql = "SELECT B.LABEL_NO, " +
				 " NVL(B.SCAN_CLS, '0') AS SCAN_CLS, " +
				 " B.PACK_NO, " +
				 " CASE WHEN B.PACK_CLS IN ('C', 'G') THEN C.POS_CD ELSE D.POS_CD END AS POS_CD, " +
				 " E.COIL_NM AS NAME_NM, " +
				 " F.STAN_NM, " +
				 " B.SIZE_NO, " +
				 " B.QUANTITY, " +
				 " B.WEIGHT " +
				 " FROM SHIP_MASTER A INNER JOIN SHIP_DETAIL B ON A.SHIP_NO = B.SHIP_NO " +
				 " LEFT OUTER JOIN COIL C ON B.COIL_NO = C.COIL_NO AND B.COIL_SEQ = C.COIL_SEQ " +
				 " LEFT OUTER JOIN COIL_PACK D ON B.COIL_NO = D.COIL_NO AND B.COIL_SEQ = D.COIL_SEQ " +
				 " LEFT OUTER JOIN CODE_NM E ON B.NAME_CD = E.NAME_CD " +
				 " LEFT OUTER JOIN CODE_STAN F ON B.STAN_CD = F.STAN_CD " +
				 " WHERE A.SHIP_TYPE IN ('S', 'Q', 'M') " +
				 " AND TRIM(A.REFERENCE_NO) = TRIM('" + ship_no + "') " +
				 " ORDER BY B.REFERENCE_NO, B.REFERENCE_SEQ ";
		
		System.out.println("seq : " + sql);
		
		ArrayList<ShipBean> detailList = new ArrayList<ShipBean>();
		try {
			stmt=con.createStatement();
			rs = stmt.executeQuery(sql);
			
			while (rs.next()) {
				ShipBean detail = new ShipBean();
				detail.setShip_no(ship_no);
				detail.setLabel_no(rs.getString("LABEL_NO"));
				detail.setScan_cls(rs.getString("SCAN_CLS"));
				detail.setPack_no(rs.getString("PACK_NO"));
				detail.setPos_cd(rs.getString("POS_CD"));
				detail.setName_nm(rs.getString("NAME_NM"));
				detail.setStan_nm(rs.getString("STAN_NM"));
				detail.setSize_no(rs.getString("SIZE_NO"));
				detail.setQuantity(rs.getInt("QUANTITY"));
				detail.setWeight(rs.getFloat("WEIGHT"));
				
				detailList.add(detail);				
			}
		} catch(Exception ex) {
			System.out.println("getShipDetail() ERROR: " + ex);			
		} 
		
		return detailList;
		
	}
	
	public boolean isLabelExist(ShipBean sbean) {
		boolean result = false;
		
		String sql = " SELECT COUNT(*) AS CNT " +
				" FROM SHIP_DETAIL A" + 
				" WHERE A.REFERENCE_NO = TRIM('" + sbean.getShip_no() + "') " + 
				" AND TRIM(A.LABEL_NO) = TRIM('" + sbean.getLabel_no() + "') " ;
		
		System.out.println("sql : " + sql);
		
		try {
			stmt=con.createStatement();
			rs = stmt.executeQuery(sql);
			
			if(rs.next()) {
				result = true;
				sbean.setCount(rs.getInt("CNT"));
			}			
		} catch(Exception ex) {
			System.out.println("isLabelExist() ERROR: " + ex);
		}
		
		return result;
	}
	
	public boolean updateShipDetail(ShipBean sbean) {
		boolean result = false;
		
		String sql = "UPDATE SHIP_DETAIL A SET " +
				" A.SCAN_CLS = '1', " +
				" A.SCAN_DATE = '" + ls_today + "', " +
				" A.SCAN_MAN_CD = '" + sbean.getLogin_id() + "', " + 
				" A.UPDATE_ID = '" + sbean.getLogin_id() + "', " +
				" A.UPDATE_PROGRAM = 'PDA', " +
				" A.UPDATE_DATETIME = '" + ls_today + "', " +
				" A.UPDATE_COMPUTER = 'PDA', " +
				" A.READ_DATETIME = '" + ls_today + "' " +
				" WHERE A.REFERENCE_NO  = TRIM('" + sbean.getShip_no() + "') " +
				" AND TRIM(A.LABEL_NO) = TRIM('" + sbean.getLabel_no() + "') ";
		
		System.out.println("sql : " + sql);
		
		try {
			stmt=con.createStatement();
			int rt = stmt.executeUpdate(sql);
			
			result = rt > 0;
		} catch(Exception ex) {
			System.out.println("updateShipDetail() ERROR: " + ex);
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

private 
private void new(object sender, EventArgs e)
{

    if ( label_no> )
    {
        MessageBox.Show("신규");
          return;
    }
   


            if (url.Scheme == Uri.UriSchn    )
            {
                HttpWebRequest req = null;
                try
                {
                    req = (HttpWebRequest)WebRequest.Create(url);
                }
                catch (UriFormatException urlE)
                {
                    MessageBox.Show("신규");
                    return;
                }

              

public static void main(String[] args)
{
   system.out.println("1");
  }

public String getyard_cust_cd() {
		return yard_cust_cd;
	}
	public void setyard_cust_cd(String yard_cust_cd) {
		this.yard_cust_cd = yard_cust_cd;
	}


 if (listView[3]== null,"");
            {
                MessageBox.Show("신규입니다.");
               
               
            }



