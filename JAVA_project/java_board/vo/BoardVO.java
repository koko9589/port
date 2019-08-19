package com.com.ocm.vo;

import java.util.Date;

public class BoardVO {
	private int SEQ;
	private String MEM_ID;
	private String MEM_NAME;
	private String BOARD_SUBJECT;
	private String BOARD_CONTENT;
	private Date REG_DATE;
	private Date UPT_DATE;
	private String VIEW_CNT;
	
	public int getSEQ() {
		return SEQ;
	}
	public void setSEQ(int sEQ) {
		SEQ = sEQ;
	}
	public String getMEM_ID() {
		return MEM_ID;
	}
	public void setMEM_ID(String mEM_ID) {
		MEM_ID = mEM_ID;
	}
	public String getMEM_NAME() {
		return MEM_NAME;
	}
	public void setMEM_NAME(String mEM_NAME) {
		MEM_NAME = mEM_NAME;
	}
	public String getBOARD_SUBJECT() {
		return BOARD_SUBJECT;
	}
	public void setBOARD_SUBJECT(String bOARD_SUBJECT) {
		BOARD_SUBJECT = bOARD_SUBJECT;
	}
	public String getBOARD_CONTENT() {
		return BOARD_CONTENT;
	}
	public void setBOARD_CONTENT(String bOARD_CONTENT) {
		BOARD_CONTENT = bOARD_CONTENT;
	}
	public Date getREG_DATE() {
		return REG_DATE;
	}
	public void setREG_DATE(Date rEG_DATE) {
		REG_DATE = rEG_DATE;
	}
	public Date getUPT_DATE() {
		return UPT_DATE;
	}
	public void setUPT_DATE(Date uPT_DATE) {
		UPT_DATE = uPT_DATE;
	}
	public String getVIEW_CNT() {
		return VIEW_CNT;
	}
	public void setVIEW_CNT(String vIEW_CNT) {
		VIEW_CNT = vIEW_CNT;
	}
	
	
}
