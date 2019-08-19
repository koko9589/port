package com.com.ocm.dao.impl;

import java.util.List;
import java.util.Map;

import org.mybatis.spring.SqlSessionTemplate;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Repository;

import com.com.ocm.dao.BoardDao;
import com.com.ocm.vo.BoardVO;

@Repository("boardDao")
public class BoardDaoImpl implements BoardDao{
	
	@Autowired
	private SqlSessionTemplate sqlssion;

	@Override
	public List<BoardVO> list(Map<String, Object> map) {
		// TODO Auto-generated method stub
		
		return sqlssion.selectList("mapper.list", map);
	}

	@Override
	public int insert(BoardVO vo) {
		// TODO Auto-generated method stub
		return sqlssion.insert("mapper.insert", vo);
	}

	@Override
	public Map<String, Object> detail(int seq) {
		// TODO Auto-generated method stub
		return sqlssion.selectOne("mapper.detail", seq);
	}

	@Override
	public int update(Map<String, Object> map) {
		// TODO Auto-generated method stub
		return sqlssion.update("mapper.update", map);
	}

	@Override
	public void delete(List<Integer> list) {
		// TODO Auto-generated method stub
		sqlssion.delete("mapper.delete", list);
	}

	@Override
	public int totalCount(Map<String, Object> map) {
		// TODO Auto-generated method stub
		return sqlssion.selectOne("mapper.totalCount", map);
	}

}
