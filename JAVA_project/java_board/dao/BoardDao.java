package com.com.ocm.dao;

import java.util.List;
import java.util.Map;

import com.com.ocm.vo.BoardVO;

public interface BoardDao {

	List<BoardVO> list(Map<String, Object> map);

	int insert(BoardVO vo);

	Map<String, Object> detail(int seq);

	int update(Map<String, Object> map);

	void delete(List<Integer> list);

	int totalCount(Map<String, Object> map);

}
